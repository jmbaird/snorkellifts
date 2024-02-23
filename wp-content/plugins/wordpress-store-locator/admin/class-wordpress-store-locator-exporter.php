<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class WordPress_Store_Locator_Exporter
{
    private $plugin_name;
    private $version;
    private $options;
    public $notice;

    /**
     * Construct Store Locator Admin Class
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    http://www.welaunch.io
     * @param   string                         $plugin_name
     * @param   string                         $version    
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->notice = "";
    }

    /**
     * Get Options
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    http://www.welaunch.io
     * @param   mixed                         $option The option key
     * @return  mixed                                 The option value
     */
    private function get_option($option)
    {
        if(!is_array($this->options)) {
            return false;
        }

        if (!array_key_exists($option, $this->options)) {
            return false;
        }

        return $this->options[$option];
    }

    public function init()
    {
        global $wordpress_store_locator_options;

        $this->options = $wordpress_store_locator_options;

        if ( ! is_admin() || !is_user_logged_in() || !current_user_can('manage_options')) {
            $this->notice .= esc_html__("You are not an admin", 'wordpress-store-locator');
            return FALSE;
        }

        add_action('admin_menu', array($this, 'create_menu'));

        if(isset($_POST['action']) && $_POST['action'] == "store_locator_export") {
            $this->export_stores();
        }

    }

    public function create_menu() {

        add_submenu_page(
            'edit.php?post_type=stores',
            esc_html__('Store Exporter', 'wordpress-store-locator'),
            esc_html__('Store Exporter', 'wordpress-store-locator'),
            'manage_options',
            'wordpress-store-locator-exporter',
            array($this, 'settings_page')
        );
    }

    public function settings_page() {
        // replaced with AJAX
        // $this->check_file_uploaded();
    ?>
        <div class="wrap">
            <h1><?php esc_html_e('WordPress Store Locator Exporter', 'wordpress-store-locator') ?></h1>

            <form id="store-locator-export" action="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="action" value="store_locator_export">

                <table class="form-table">                              
                    <tr valign="top">
                        <th scope="row">Countries to Export<br><small>Empty = All tores</small></th>
                        <td>
                            <select name="store_locator_countries[]" class="wordpress-store-locator-input-field store-locator-select2" multiple>
                            <?php
                            $countries = $this->get_countries();
                            foreach ($countries as $code => $countryName) {
                                echo '<option value="' . $code . '">' . $countryName . '</option>';
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Try Update</th>
                        <td><input type="checkbox" name="store_locator_delete_stores" value="1"><?php esc_html_e('Delete store after Export', 'wordpress-store-locator') ?></td>
                    </tr>
                </table>

                <p class="submit">
                    <button id="store-export-button" type="submit" name="submit"  class="button button-primary"><?php esc_html_e('Export Stores', 'wordpress-store-locator') ?></button>
                </p>
            </form>

        </div>
    <?php 
    }

    public function export_stores()
    {
        $countries = array();
        if(isset($_POST['store_locator_countries']) && !empty($_POST['store_locator_countries'])) {
            $countries = array_filter( $_POST['store_locator_countries'] );
        }

        add_action( 'admin_notices', array($this, 'notice' ));

        $stores = $this->get_stores($countries);
        if(empty($stores)) {
            $this->notice .= esc_html__("No Stores to Export", 'wordpress-store-locator');
            return FALSE;
        }

        if(!empty($stores) && isset($_POST['store_locator_delete_stores']) && !empty($_POST['store_locator_delete_stores'])) {
            $this->notice .= esc_html__("Stores deleted.", 'wordpress-store-locator');
            foreach($stores as $store) {
                wp_delete_post($store['id']);
            }
        }


        if($this->build_export($stores)) {
            $this->notice .= esc_html__("Your Store Export is ready. The Download should start automatically.", 'wordpress-store-locator');
        } else {
            $this->notice .= esc_html__("Something was wrong with the export generation ...", 'wordpress-store-locator');
        };
        
    }

    public function get_stores($countries = array())
    {
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'stores',
            'post_status'      => 'publish',
        );

        if(!empty($countries)) {
            $args['meta_query'] = array(
                array(
                    'key'       => 'wordpress_store_locator_country',
                    'value'     => $countries,
                    'compare'   => 'IN',
                )
            );
        }

        $posts = get_posts( $args );
        $prefix = 'wordpress_store_locator_';
        $possibleCategories = get_terms(array( 'taxonomy' =>'store_category', 'hide_empty' => false));
        $possibleFilters = get_terms(array( 'taxonomy' =>'store_filter', 'hide_empty' => false));
        
        $stores = array();
        foreach ($posts as $post) {
            $id = $post->ID;

            $stores[$id]['id'] = $id;
            $stores[$id]['customerId'] = get_post_meta( $id, $prefix . 'customerId', true);
            $stores[$id]['name'] = $post->post_title;
            $stores[$id]['status'] = $post->post_status;
            
            $stores[$id]['address1'] = get_post_meta( $id, $prefix . 'address1', true);
            $stores[$id]['address2'] = get_post_meta( $id, $prefix . 'address2', true);
            $stores[$id]['zip'] = get_post_meta( $id, $prefix . 'zip', true);
            $stores[$id]['city'] = get_post_meta( $id, $prefix . 'city', true);
            $stores[$id]['region'] = get_post_meta( $id, $prefix . 'region', true);
            $stores[$id]['country'] = get_post_meta( $id, $prefix . 'country', true);
            $stores[$id]['telephone'] = get_post_meta( $id, $prefix . 'telephone', true);
            $stores[$id]['mobile'] = get_post_meta( $id, $prefix . 'mobile', true);
            $stores[$id]['fax'] = get_post_meta( $id, $prefix . 'fax', true);
            $stores[$id]['email'] = get_post_meta( $id, $prefix . 'email', true);
            $stores[$id]['website'] = get_post_meta( $id, $prefix . 'website', true);
            $stores[$id]['premium'] = get_post_meta( $id, $prefix . 'premium', true);
            $stores[$id]['ranking'] = get_post_meta( $id, $prefix . 'ranking', true);
            $stores[$id]['online'] = get_post_meta( $id, $prefix . 'online', true);
            $stores[$id]['offline'] = get_post_meta( $id, $prefix . 'offline', true);
            $stores[$id]['icon'] = get_post_meta( $id, $prefix . 'icon', true);
            $stores[$id]['lat'] = get_post_meta( $id, $prefix . 'lat', true);
            $stores[$id]['lng'] = get_post_meta( $id, $prefix . 'lng', true);

            $customFields = $this->get_option('showCustomFields');
            if(!empty($customFields)) {

                foreach ($customFields as $customFieldKey => $customFieldName) {

                    $originalCustomFieldKey = $customFieldKey;
                    $customFieldKey = $prefix . $customFieldKey;
                    
                    $stores[$id][$originalCustomFieldKey] = get_post_meta( $id, $customFieldKey, true);
                }
            }

            $stores[$id]['description'] = $post->post_content;

            $storeFilters = wp_get_post_terms( $id, 'store_filter', array('fields' => 'slugs') );
            foreach ($possibleFilters as $possibleFilter) {

                $filter = $possibleFilter->slug;
                if(in_array($filter, $storeFilters))
                {
                    $stores[$id][$filter] = 1;
                } else {
                    $stores[$id][$filter] = 0;
                }
            }

            $storeCategories = wp_get_post_terms( $id, 'store_category', array('fields' => 'slugs') );
            foreach ($possibleCategories as $possibleCategory) {

                $category = $possibleCategory->slug;
                if(in_array($category, $storeCategories))
                {
                    $stores[$id][$category] = 1;
                } else {
                    $stores[$id][$category] = 0;
                }
            }

            $weekdays = array(
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday',
            );

            foreach ($weekdays as $weekday) {
                $stores[$id][$weekday . '_open'] = get_post_meta( $id, $prefix . $weekday . '_open', true);
                $stores[$id][$weekday . '_close'] = get_post_meta( $id, $prefix . $weekday . '_close', true);
            }

            foreach ($weekdays as $weekday) {
                $stores[$id][$weekday . '_open2'] = get_post_meta( $id, $prefix . $weekday . '_open2', true);
                $stores[$id][$weekday . '_close2'] = get_post_meta( $id, $prefix . $weekday . '_close2', true);
            }
        }

        return $stores;
    }

    public function build_export($stores)
    {
        $excelExt = '.xlsx';
        $writer = 'Xlsx';

        $useExcel2007 = $this->get_option('excel2007');

        if($useExcel2007 == "1") {
            $excelExt = '.xls';
            $writer = 'Xls';
        }

        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator("weLaunch")
                                     ->setLastModifiedBy("weLaunch")
                                     ->setTitle("Store Export (".date('Y.m.d - H:i:s').")")
                                     ->setSubject("Stores export")
                                     ->setDescription("Stores export.")
                                     ->setKeywords("wordpress stores");
        // Add some data
        // A note from the manual: In PHPExcel column index is 0-based while row index is 1-based. That means 'A1' ~ (0,1)
        $row = 1; // 1-based index
        $firstLine = true;
        foreach ($stores as $fields) {
            $col = 1;
            if ($firstLine) {
                $keys = array_keys($fields);
                foreach ($keys as $key) {
                    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $key);
                    $col++;
                }
                $row++;
                $col = 1;
                $firstLine = false;
            } 
           
            foreach($fields as $key => $value) {

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
                $col++;
            }
            $row++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Export ('.date('Y.m.d - H.i.s').')');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Excel2007)
        // ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="stores-export_' . date('Y-m-d_H-i-s') . $excelExt . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, $writer);
        // ob_end_clean();
        $writer->save('php://output');

        exit();
        return TRUE;
    }

    public function getSampleImportFile()
    {
        global $wordpress_store_locator_options;

        $this->options = $wordpress_store_locator_options;

        $stores = array();

        $possibleCategories = get_terms(array( 'taxonomy' =>'store_category', 'hide_empty' => false));
        $possibleFilters = get_terms(array( 'taxonomy' =>'store_filter', 'hide_empty' => false));
        
        $id = 1;
        $stores[$id]['id'] = '';
        $stores[$id]['customerId'] = '123-CRM';
        $stores[$id]['name'] = 'weLaunch';
        $stores[$id]['status'] = 'publish';

        $stores[$id]['address1'] = 'In den Sandbergen 36';
        $stores[$id]['address2'] = '';
        $stores[$id]['zip'] = '49808';
        $stores[$id]['city'] = 'Lingen';
        $stores[$id]['region'] = 'Niedersachsen';
        $stores[$id]['country'] = 'DE';
        $stores[$id]['telephone'] = '0591 - 48482';
        $stores[$id]['mobile'] = '01511 - 48482';
        $stores[$id]['fax'] = '';
        $stores[$id]['email'] = 'support@welaunch.io';
        $stores[$id]['website'] = 'https://welaunch.io';
        $stores[$id]['premium'] = '0';
        $stores[$id]['ranking'] = '10';
        $stores[$id]['online'] = '0';
        $stores[$id]['offline'] = '0';
        $stores[$id]['icon'] = 'https://demos.welaunch.io/wordpress-store-locator/wp-content/uploads/sites/11/2017/08/default.png';
        $stores[$id]['lat'] = '56.4545';
        $stores[$id]['lng'] = '12.35345';

        $customFields = $this->get_option('showCustomFields');
        if(!empty($customFields)) {
            foreach ($customFields as $customFieldKey => $customFieldName) {
                $stores[$id][$customFieldKey] = 'Custom Value X';
            }
        }

        $stores[$id]['description'] = 'Web Agency';

        foreach ($possibleFilters as $possibleFilter) {
            $filter = $possibleFilter->slug;
            $stores[$id][$filter] = 0;
        }

        foreach ($possibleCategories as $possibleCategory) {
            $category = $possibleCategory->slug;
            $stores[$id][$category] = 0;
        }

        $weekdays = array(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        );
        foreach ($weekdays as $weekday) {
            $stores[$id][$weekday . '_open'] = '08:00';
            $stores[$id][$weekday . '_close'] = '17:00';
        }

        foreach ($weekdays as $weekday) {
            $stores[$id][$weekday . '_open2'] = '08:00';
            $stores[$id][$weekday . '_close2'] = '17:00';
        }

        if($this->build_export($stores)) {
            $this->notice .= esc_html__("Demo Store Export is ready. The Download should start automatically.", 'wordpress-store-locator');
        } else {
            $this->notice .= esc_html__("Something was wrong with the export generation ...", 'wordpress-store-locator');
        };
    }

    public function notice()
    {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo $this->notice ?></p>
        </div>
        <?php
    }

    private function get_countries()
    {
        $countries = array( 
            "AF" => esc_html__("Afghanistan", 'wordpress-store-locator'),"AL" => esc_html__("Albania", 'wordpress-store-locator'),"DZ" => esc_html__("Algeria", 'wordpress-store-locator'),"AS" => esc_html__("American Samoa", 'wordpress-store-locator'),"AD" => esc_html__("Andorra", 'wordpress-store-locator'),"AO" => esc_html__("Angola", 'wordpress-store-locator'),"AI" => esc_html__("Anguilla", 'wordpress-store-locator'),"AQ" => esc_html__("Antarctica", 'wordpress-store-locator'),"AG" => esc_html__("Antigua and Barbuda", 'wordpress-store-locator'),"AR" => esc_html__("Argentina", 'wordpress-store-locator'),"AM" => esc_html__("Armenia", 'wordpress-store-locator'),"AW" => esc_html__("Aruba", 'wordpress-store-locator'),"AU" => esc_html__("Australia", 'wordpress-store-locator'),"AT" => esc_html__("Austria", 'wordpress-store-locator'),"AZ" => esc_html__("Azerbaijan", 'wordpress-store-locator'),"BS" => esc_html__("Bahamas", 'wordpress-store-locator'),"BH" => esc_html__("Bahrain", 'wordpress-store-locator'),"BD" => esc_html__("Bangladesh", 'wordpress-store-locator'),"BB" => esc_html__("Barbados", 'wordpress-store-locator'),"BY" => esc_html__("Belarus", 'wordpress-store-locator'),"BE" => esc_html__("Belgium", 'wordpress-store-locator'),"BZ" => esc_html__("Belize", 'wordpress-store-locator'),"BJ" => esc_html__("Benin", 'wordpress-store-locator'),"BM" => esc_html__("Bermuda", 'wordpress-store-locator'),"BT" => esc_html__("Bhutan", 'wordpress-store-locator'),"BO" => esc_html__("Bolivia", 'wordpress-store-locator'),"BA" => esc_html__("Bosnia and Herzegovina", 'wordpress-store-locator'),"BW" => esc_html__("Botswana", 'wordpress-store-locator'),"BV" => esc_html__("Bouvet Island", 'wordpress-store-locator'),"BR" => esc_html__("Brazil", 'wordpress-store-locator'),"BQ" => esc_html__("British Antarctic Territory", 'wordpress-store-locator'),"IO" => esc_html__("British Indian Ocean Territory", 'wordpress-store-locator'),"VG" => esc_html__("British Virgin Islands", 'wordpress-store-locator'),"BN" => esc_html__("Brunei", 'wordpress-store-locator'),"BG" => esc_html__("Bulgaria", 'wordpress-store-locator'),"BF" => esc_html__("Burkina Faso", 'wordpress-store-locator'),"BI" => esc_html__("Burundi", 'wordpress-store-locator'),"KH" => esc_html__("Cambodia", 'wordpress-store-locator'),"CM" => esc_html__("Cameroon", 'wordpress-store-locator'),"CA" => esc_html__("Canada", 'wordpress-store-locator'),"CT" => esc_html__("Canton and Enderbury Islands", 'wordpress-store-locator'),"CV" => esc_html__("Cape Verde", 'wordpress-store-locator'),"KY" => esc_html__("Cayman Islands", 'wordpress-store-locator'),"CF" => esc_html__("Central African Republic", 'wordpress-store-locator'),"TD" => esc_html__("Chad", 'wordpress-store-locator'),"CL" => esc_html__("Chile", 'wordpress-store-locator'),"CN" => esc_html__("China", 'wordpress-store-locator'),"CX" => esc_html__("Christmas Island", 'wordpress-store-locator'),"CC" => esc_html__("Cocos [Keeling] Islands", 'wordpress-store-locator'),"CO" => esc_html__("Colombia", 'wordpress-store-locator'),"KM" => esc_html__("Comoros", 'wordpress-store-locator'),"CG" => esc_html__("Congo - Brazzaville", 'wordpress-store-locator'),"CD" => esc_html__("Congo - Kinshasa", 'wordpress-store-locator'),"CK" => esc_html__("Cook Islands", 'wordpress-store-locator'),"CR" => esc_html__("Costa Rica", 'wordpress-store-locator'),"HR" => esc_html__("Croatia", 'wordpress-store-locator'),"CU" => esc_html__("Cuba", 'wordpress-store-locator'),"CY" => esc_html__("Cyprus", 'wordpress-store-locator'),"CZ" => esc_html__("Czech Republic", 'wordpress-store-locator'),"CI" => esc_html__("Côte d’Ivoire", 'wordpress-store-locator'),"DK" => esc_html__("Denmark", 'wordpress-store-locator'),"DJ" => esc_html__("Djibouti", 'wordpress-store-locator'),"DM" => esc_html__("Dominica", 'wordpress-store-locator'),"DO" => esc_html__("Dominican Republic", 'wordpress-store-locator'),"NQ" => esc_html__("Dronning Maud Land", 'wordpress-store-locator'),"DD" => esc_html__("East Germany", 'wordpress-store-locator'),"EC" => esc_html__("Ecuador", 'wordpress-store-locator'),"EG" => esc_html__("Egypt", 'wordpress-store-locator'),"SV" => esc_html__("El Salvador", 'wordpress-store-locator'),"GQ" => esc_html__("Equatorial Guinea", 'wordpress-store-locator'),"ER" => esc_html__("Eritrea", 'wordpress-store-locator'),"EE" => esc_html__("Estonia", 'wordpress-store-locator'),"ET" => esc_html__("Ethiopia", 'wordpress-store-locator'),"FK" => esc_html__("Falkland Islands", 'wordpress-store-locator'),"FO" => esc_html__("Faroe Islands", 'wordpress-store-locator'),"FJ" => esc_html__("Fiji", 'wordpress-store-locator'),"FI" => esc_html__("Finland", 'wordpress-store-locator'),"FR" => esc_html__("France", 'wordpress-store-locator'),"GF" => esc_html__("French Guiana", 'wordpress-store-locator'),"PF" => esc_html__("French Polynesia", 'wordpress-store-locator'),"TF" => esc_html__("French Southern Territories", 'wordpress-store-locator'),"FQ" => esc_html__("French Southern and Antarctic Territories", 'wordpress-store-locator'),"GA" => esc_html__("Gabon", 'wordpress-store-locator'),"GM" => esc_html__("Gambia", 'wordpress-store-locator'),"GE" => esc_html__("Georgia", 'wordpress-store-locator'),"DE" => esc_html__("Germany", 'wordpress-store-locator'),"GH" => esc_html__("Ghana", 'wordpress-store-locator'),"GI" => esc_html__("Gibraltar", 'wordpress-store-locator'),"GR" => esc_html__("Greece", 'wordpress-store-locator'),"GL" => esc_html__("Greenland", 'wordpress-store-locator'),"GD" => esc_html__("Grenada", 'wordpress-store-locator'),"GP" => esc_html__("Guadeloupe", 'wordpress-store-locator'),"GU" => esc_html__("Guam", 'wordpress-store-locator'),"GT" => esc_html__("Guatemala", 'wordpress-store-locator'),"GG" => esc_html__("Guernsey", 'wordpress-store-locator'),"GN" => esc_html__("Guinea", 'wordpress-store-locator'),"GW" => esc_html__("Guinea-Bissau", 'wordpress-store-locator'),"GY" => esc_html__("Guyana", 'wordpress-store-locator'),"HT" => esc_html__("Haiti", 'wordpress-store-locator'),"HM" => esc_html__("Heard Island and McDonald Islands", 'wordpress-store-locator'),"HN" => esc_html__("Honduras", 'wordpress-store-locator'),"HK" => esc_html__("Hong Kong SAR China", 'wordpress-store-locator'),"HU" => esc_html__("Hungary", 'wordpress-store-locator'),"IS" => esc_html__("Iceland", 'wordpress-store-locator'),"IN" => esc_html__("India", 'wordpress-store-locator'),"ID" => esc_html__("Indonesia", 'wordpress-store-locator'),"IR" => esc_html__("Iran", 'wordpress-store-locator'),"IQ" => esc_html__("Iraq", 'wordpress-store-locator'),"IE" => esc_html__("Ireland", 'wordpress-store-locator'),"IM" => esc_html__("Isle of Man", 'wordpress-store-locator'),"IL" => esc_html__("Israel", 'wordpress-store-locator'),"IT" => esc_html__("Italy", 'wordpress-store-locator'),"JM" => esc_html__("Jamaica", 'wordpress-store-locator'),"JP" => esc_html__("Japan", 'wordpress-store-locator'),"JE" => esc_html__("Jersey", 'wordpress-store-locator'),"JT" => esc_html__("Johnston Island", 'wordpress-store-locator'),"JO" => esc_html__("Jordan", 'wordpress-store-locator'),"KZ" => esc_html__("Kazakhstan", 'wordpress-store-locator'),"KE" => esc_html__("Kenya", 'wordpress-store-locator'),"KI" => esc_html__("Kiribati", 'wordpress-store-locator'),"KW" => esc_html__("Kuwait", 'wordpress-store-locator'),"KG" => esc_html__("Kyrgyzstan", 'wordpress-store-locator'),"LA" => esc_html__("Laos", 'wordpress-store-locator'),"LV" => esc_html__("Latvia", 'wordpress-store-locator'),"LB" => esc_html__("Lebanon", 'wordpress-store-locator'),"LS" => esc_html__("Lesotho", 'wordpress-store-locator'),"LR" => esc_html__("Liberia", 'wordpress-store-locator'),"LY" => esc_html__("Libya", 'wordpress-store-locator'),"LI" => esc_html__("Liechtenstein", 'wordpress-store-locator'),"LT" => esc_html__("Lithuania", 'wordpress-store-locator'),"LU" => esc_html__("Luxembourg", 'wordpress-store-locator'),"MO" => esc_html__("Macau SAR China", 'wordpress-store-locator'),"MK" => esc_html__("Macedonia", 'wordpress-store-locator'),"MG" => esc_html__("Madagascar", 'wordpress-store-locator'),"MW" => esc_html__("Malawi", 'wordpress-store-locator'),"MY" => esc_html__("Malaysia", 'wordpress-store-locator'),"MV" => esc_html__("Maldives", 'wordpress-store-locator'),"ML" => esc_html__("Mali", 'wordpress-store-locator'),"MT" => esc_html__("Malta", 'wordpress-store-locator'),"MH" => esc_html__("Marshall Islands", 'wordpress-store-locator'),"MQ" => esc_html__("Martinique", 'wordpress-store-locator'),"MR" => esc_html__("Mauritania", 'wordpress-store-locator'),"MU" => esc_html__("Mauritius", 'wordpress-store-locator'),"YT" => esc_html__("Mayotte", 'wordpress-store-locator'),"FX" => esc_html__("Metropolitan France", 'wordpress-store-locator'),"MX" => esc_html__("Mexico", 'wordpress-store-locator'),"FM" => esc_html__("Micronesia", 'wordpress-store-locator'),"MI" => esc_html__("Midway Islands", 'wordpress-store-locator'),"MD" => esc_html__("Moldova", 'wordpress-store-locator'),"MC" => esc_html__("Monaco", 'wordpress-store-locator'),"MN" => esc_html__("Mongolia", 'wordpress-store-locator'),"ME" => esc_html__("Montenegro", 'wordpress-store-locator'),"MS" => esc_html__("Montserrat", 'wordpress-store-locator'),"MA" => esc_html__("Morocco", 'wordpress-store-locator'),"MZ" => esc_html__("Mozambique", 'wordpress-store-locator'),"MM" => esc_html__("Myanmar [Burma]", 'wordpress-store-locator'),"NA" => esc_html__("Namibia", 'wordpress-store-locator'),"NR" => esc_html__("Nauru", 'wordpress-store-locator'),"NP" => esc_html__("Nepal", 'wordpress-store-locator'),"NL" => esc_html__("Netherlands", 'wordpress-store-locator'),"AN" => esc_html__("Netherlands Antilles", 'wordpress-store-locator'),"NT" => esc_html__("Neutral Zone", 'wordpress-store-locator'),"NC" => esc_html__("New Caledonia", 'wordpress-store-locator'),"NZ" => esc_html__("New Zealand", 'wordpress-store-locator'),"NI" => esc_html__("Nicaragua", 'wordpress-store-locator'),"NE" => esc_html__("Niger", 'wordpress-store-locator'),"NG" => esc_html__("Nigeria", 'wordpress-store-locator'),"NU" => esc_html__("Niue", 'wordpress-store-locator'),"NF" => esc_html__("Norfolk Island", 'wordpress-store-locator'),"KP" => esc_html__("North Korea", 'wordpress-store-locator'),"VD" => esc_html__("North Vietnam", 'wordpress-store-locator'),"MP" => esc_html__("Northern Mariana Islands", 'wordpress-store-locator'),"NO" => esc_html__("Norway", 'wordpress-store-locator'),"OM" => esc_html__("Oman", 'wordpress-store-locator'),"PC" => esc_html__("Pacific Islands Trust Territory", 'wordpress-store-locator'),"PK" => esc_html__("Pakistan", 'wordpress-store-locator'),"PW" => esc_html__("Palau", 'wordpress-store-locator'),"PS" => esc_html__("Palestinian Territories", 'wordpress-store-locator'),"PA" => esc_html__("Panama", 'wordpress-store-locator'),"PZ" => esc_html__("Panama Canal Zone", 'wordpress-store-locator'),"PG" => esc_html__("Papua New Guinea", 'wordpress-store-locator'),"PY" => esc_html__("Paraguay", 'wordpress-store-locator'),"YD" => esc_html__("People's Democratic Republic of Yemen", 'wordpress-store-locator'),"PE" => esc_html__("Peru", 'wordpress-store-locator'),"PH" => esc_html__("Philippines", 'wordpress-store-locator'),"PN" => esc_html__("Pitcairn Islands", 'wordpress-store-locator'),"PL" => esc_html__("Poland", 'wordpress-store-locator'),"PT" => esc_html__("Portugal", 'wordpress-store-locator'),"PR" => esc_html__("Puerto Rico", 'wordpress-store-locator'),"QA" => esc_html__("Qatar", 'wordpress-store-locator'),"RO" => esc_html__("Romania", 'wordpress-store-locator'),"RU" => esc_html__("Russia", 'wordpress-store-locator'),"RW" => esc_html__("Rwanda", 'wordpress-store-locator'),"RE" => esc_html__("Réunion", 'wordpress-store-locator'),"BL" => esc_html__("Saint Barthélemy", 'wordpress-store-locator'),"SH" => esc_html__("Saint Helena", 'wordpress-store-locator'),"KN" => esc_html__("Saint Kitts and Nevis", 'wordpress-store-locator'),"LC" => esc_html__("Saint Lucia", 'wordpress-store-locator'),"MF" => esc_html__("Saint Martin", 'wordpress-store-locator'),"PM" => esc_html__("Saint Pierre and Miquelon", 'wordpress-store-locator'),"VC" => esc_html__("Saint Vincent and the Grenadines", 'wordpress-store-locator'),"WS" => esc_html__("Samoa", 'wordpress-store-locator'),"SM" => esc_html__("San Marino", 'wordpress-store-locator'),"SA" => esc_html__("Saudi Arabia", 'wordpress-store-locator'),"SN" => esc_html__("Senegal", 'wordpress-store-locator'),"RS" => esc_html__("Serbia", 'wordpress-store-locator'),"CS" => esc_html__("Serbia and Montenegro", 'wordpress-store-locator'),"SC" => esc_html__("Seychelles", 'wordpress-store-locator'),"SL" => esc_html__("Sierra Leone", 'wordpress-store-locator'),"SG" => esc_html__("Singapore", 'wordpress-store-locator'),"SK" => esc_html__("Slovakia", 'wordpress-store-locator'),"SI" => esc_html__("Slovenia", 'wordpress-store-locator'),"SB" => esc_html__("Solomon Islands", 'wordpress-store-locator'),"SO" => esc_html__("Somalia", 'wordpress-store-locator'),"ZA" => esc_html__("South Africa", 'wordpress-store-locator'),"GS" => esc_html__("South Georgia and the South Sandwich Islands", 'wordpress-store-locator'),"KR" => esc_html__("South Korea", 'wordpress-store-locator'),"ES" => esc_html__("Spain", 'wordpress-store-locator'),"LK" => esc_html__("Sri Lanka", 'wordpress-store-locator'),"SD" => esc_html__("Sudan", 'wordpress-store-locator'),"SR" => esc_html__("Suriname", 'wordpress-store-locator'),"SJ" => esc_html__("Svalbard and Jan Mayen", 'wordpress-store-locator'),"SZ" => esc_html__("Swaziland", 'wordpress-store-locator'),"SE" => esc_html__("Sweden", 'wordpress-store-locator'),"CH" => esc_html__("Switzerland", 'wordpress-store-locator'),"SY" => esc_html__("Syria", 'wordpress-store-locator'),"ST" => esc_html__("São Tomé and Príncipe", 'wordpress-store-locator'),"TW" => esc_html__("Taiwan", 'wordpress-store-locator'),"TJ" => esc_html__("Tajikistan", 'wordpress-store-locator'),"TZ" => esc_html__("Tanzania", 'wordpress-store-locator'),"TH" => esc_html__("Thailand", 'wordpress-store-locator'),"TL" => esc_html__("Timor-Leste", 'wordpress-store-locator'),"TG" => esc_html__("Togo", 'wordpress-store-locator'),"TK" => esc_html__("Tokelau", 'wordpress-store-locator'),"TO" => esc_html__("Tonga", 'wordpress-store-locator'),"TT" => esc_html__("Trinidad and Tobago", 'wordpress-store-locator'),"TN" => esc_html__("Tunisia", 'wordpress-store-locator'),"TR" => esc_html__("Turkey", 'wordpress-store-locator'),"TM" => esc_html__("Turkmenistan", 'wordpress-store-locator'),"TC" => esc_html__("Turks and Caicos Islands", 'wordpress-store-locator'),"TV" => esc_html__("Tuvalu", 'wordpress-store-locator'),"UM" => esc_html__("U.S. Minor Outlying Islands", 'wordpress-store-locator'),"PU" => esc_html__("U.S. Miscellaneous Pacific Islands", 'wordpress-store-locator'),"VI" => esc_html__("U.S. Virgin Islands", 'wordpress-store-locator'),"UG" => esc_html__("Uganda", 'wordpress-store-locator'),"UA" => esc_html__("Ukraine", 'wordpress-store-locator'),"SU" => esc_html__("Union of Soviet Socialist Republics", 'wordpress-store-locator'),"AE" => esc_html__("United Arab Emirates", 'wordpress-store-locator'),"GB" => esc_html__("United Kingdom", 'wordpress-store-locator'),"US" => esc_html__("United States", 'wordpress-store-locator'),"ZZ" => esc_html__("Unknown or Invalid Region", 'wordpress-store-locator'),"UY" => esc_html__("Uruguay", 'wordpress-store-locator'),"UZ" => esc_html__("Uzbekistan", 'wordpress-store-locator'),"VU" => esc_html__("Vanuatu", 'wordpress-store-locator'),"VA" => esc_html__("Vatican City", 'wordpress-store-locator'),"VE" => esc_html__("Venezuela", 'wordpress-store-locator'),"VN" => esc_html__("Vietnam", 'wordpress-store-locator'),"WK" => esc_html__("Wake Island", 'wordpress-store-locator'),"WF" => esc_html__("Wallis and Futuna", 'wordpress-store-locator'),"EH" => esc_html__("Western Sahara", 'wordpress-store-locator'),"YE" => esc_html__("Yemen", 'wordpress-store-locator'),"ZM" => esc_html__("Zambia", 'wordpress-store-locator'),"ZW" => esc_html__("Zimbabwe", 'wordpress-store-locator'),"AX" => esc_html__("Åland Islands", 'wordpress-store-locator'));

        return $countries;
    }
}