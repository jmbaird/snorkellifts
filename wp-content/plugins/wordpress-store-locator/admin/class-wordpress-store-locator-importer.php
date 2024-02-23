<?php

use \dotzero\GMapsGeocode;
use \dotzero\GMapsException;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class WordPress_Store_Locator_Importer
{
    private $plugin_name;
    private $version;

    protected $file;
    protected $rows;
    protected $columns;
    protected $options;

    public $notice;
    public $try_update;

    /**
     * Construct Store Locator Admin Class
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   string                         $plugin_name
     * @param   string                         $version    
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->notice = "";
        $this->file = "";
        $this->rows = 0;
        $this->columns = 0;

        $this->try_update = false;
    }

    /**
     * Get Options
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
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

        add_action('admin_menu', array($this, 'create_menu'));
        add_action('wp_ajax_upload_store_locator_file', array($this, 'check_file_uploaded'));
        add_action('wp_ajax_import_stores', array($this, 'import_stores'));
    }

    public function create_menu() {

        add_submenu_page(
            'edit.php?post_type=stores',
            esc_html__('Store Importer', 'wordpress-store-locator'),
            esc_html__('Store Importer', 'wordpress-store-locator'),
            'manage_options',
            'wordpress-store-locator-importer',
            array($this, 'settings_page')
        );
    }

    public function settings_page() {
        // replaced with AJAX
        // $this->check_file_uploaded();
    ?>
        <div class="wrap">
            <h1>WordPress Store Locator Importer</h1>

            <script>
            (function( $ ) {

                var loadingIcon = '<svg width="40" height="10" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#3171ee"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="1005" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle></svg>';

                jQuery(document).ready(function(e){

                    var ajaxURL = '<?php echo admin_url('admin-ajax.php'); ?>';
                    var logContainer = $('.wordpress-store-locator-import-log');
                    var maxRows = 0;
                    var maxColumms = 0;
                    var file = "";
                    var batch = 0;
                    var maxBatches = 1;

                    function importStores() {

                        $.ajax( {
                            type: "POST",
                            url: ajaxURL,
                            dataType: 'json',
                            data: {
                                'action' : 'import_stores',
                                "batch" : batch,
                                "rows" : maxRows,
                                "update_stores" : $('#store-import-update:checked').val(),
                                "columns" : maxColumms,
                                "file" : file
                            }, 
                            success: function( response ) {

                                logContainer.append(response.message);

                                if(!response.return) {
                                    return;
                                }

                                if(batch == maxBatches) {
                                    $('#store-import-button').html('Import Stores').removeAttr('disabled');
                                    $('#wordpress-store-locator-import-current').text(maxRows);
                                    return;
                                }

                                $('#wordpress-store-locator-import-current').text( (batch + 1) * 20);

                                batch++;
                                importStores();
                            }
                        })
                    }

                    // Submit form data via Ajax
                    jQuery("#wordpress-store-locator-import").on('submit', function(e) {
                        e.preventDefault();
                        
                        // get file field value using field id
                        var fileInputElement = document.getElementById("store-import-file").files[0];
                        if(!fileInputElement) {
                            alert('File missing');
                            return false;

                        }  else {
                            
                            var fileName = fileInputElement.name;

                            $('#store-import-button').html(loadingIcon).attr('disabled', 'disabled');

                            jQuery.ajax({
                                url: ajaxURL,
                                type: "POST",
                                processData:  false,
                                dataType: 'json',
                                contentType:  false,
                                data:  new FormData(this),
                                success : function( response ){

                                    logContainer.html('<p>' + response.message + '</p>');

                                    maxRows = response.rows;
                                    maxColumms = response.columns;
                                    file = response.file;

                                    if(!response.return) {
                                        alert('File upload error');
                                        return;
                                    }

                                    if(response.return){

                                        maxBatches = Math.ceil( response.rows / 20 ) - 1;
                                        importStores();
                                    }
                                },
                            });
                            return false;
                        }
                        return false;
                    });
                });
            })( jQuery );
            </script>

            <form id="wordpress-store-locator-import" method="post" enctype="multipart/form-data">

                <input type="hidden" name="action" value="upload_store_locator_file">
                <input type="hidden" name="store_import_file_path" id="store_import_file_path" value="">

                <table class="form-table">            
                    <tr valign="top">
                        <td colspan="2" width="300px">
                            <b>Batch Import:</b> The importer will import stores in batches of 20 via AJAX. You can leave, but do not close this tab until the import has been finished!<br>
                            <b>Updating:</b> When you check "try update" a check will be done by Customer ID first. If customer ID not exists, it checks by ID (Post ID / 1st Column). If no ID it checks if name exists. If ID not exists or name not found a store will be created.<br>
                            <b>How to use best:</b> 1. Export all Stores (see settings > export stores button) 2. Do modifications in excel file. 3. Delete all stores or skip when no stores should be deleted (see settings > delete all stores) 4. Import modified Excel file.
                        </td>
                    </tr>                    
                    <tr valign="top">
                        <th scope="row">File to Import</th>
                        <td><input type="file" id="store-import-file" name="store_import_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Try Update</th>
                        <td><input type="checkbox" id="store-import-update" name="update_stores" value="1"> Try Updating Stores</td>
                    </tr>
                </table>

                <p class="submit">
                    <button id="store-import-button" type="submit" name="submit" id="submit" class="button button-primary">Import Stores</button>
                </p>
            </form>

            <div class="wordpress-store-locator-import-log" style="max-height: 300px; overflow: scroll; background-color: #eaeaea; padding: 10px;">
                
            </div>
        </div>
    <?php 
    }

    public function check_file_uploaded()
    {
        if(!isset($_POST) || empty($_POST)) {
            return FALSE;
        }

        if(!isset($_FILES['store_import_file']['name']) || empty($_FILES['store_import_file']['name'])){
            $this->notice = "No file selected.";
            $this->notice(false);
        }

        $xls_mimetypes = array(
                'application/vnd.ms-excel',
                'application/vnd.ms-excel.addin.macroEnabled.12',
                'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
                'application/vnd.ms-excel.sheet.macroEnabled.12',
                'application/vnd.ms-excel.template.macroEnabled.12',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/octet-stream'
        );
        if(!in_array($_FILES['store_import_file']['type'], $xls_mimetypes)){
            $this->notice =  "Only Excels files allowed (given: ".$_FILES["store_import_file"]["type"].")";
            $this->notice(false);
        }

        // Use the wordpress function to upload
        // store_import_file corresponds to the position in the $_FILES array
        // 0 means the content is not associated with any other posts
        $attachment_id = media_handle_upload('store_import_file', 0);
        $file = get_attached_file($attachment_id);

        // Error checking using WP functions
        if(is_wp_error($attachment_id)){
            $this->notice = "Error uploading file: " . $attachment_id->get_error_message();
            $this->notice(false);
        }

        $this->file = $file;

       $writer = 'Xlsx';

        $useExcel2007 = $this->get_option('excel2007');
        if($useExcel2007 == "1") {
            $writer = 'Xls';
        }

        $file = str_replace('avada//avada', 'avada', $file);
        $file = str_replace('//', '/', $file);

        try {
            $objReader = IOFactory::createReader($writer);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($file);

            $objWorksheet = $objPHPExcel->getActiveSheet();
            $this->rows = $objWorksheet->getHighestRow(); 
            $highestColumn = $objWorksheet->getHighestColumn(); 

            $this->columns = Coordinate::columnIndexFromString($highestColumn); // PHPExcel_Cell::columnIndexFromString($highestColumn); 
        } catch (Exception $e) {
            $this->notice = 'Your file seems to be corrupt.<br/>' . $e->getMessage();
            $this->notice(false);
        }

        $this->notice = '<b>File uploaded. Found ' . $this->rows . ' rows and ' . $this->columns . ' columns</b>. Importing stores now: <span id="wordpress-store-locator-import-current">0</span> / ' . $this->rows;

        $this->notice();

        // $this->handle_upload($link);
    }

    public function import_stores()
    {
        if(isset($_POST['update_stores']) && $_POST['update_stores'] == "1") {
            $this->try_update = true;
        }
        
        if(!isset($_POST['file']) || empty($_POST['file'])) {
            $this->notice .= 'File missing.';
            $this->notice(false);
        }

        $file = $_POST['file'];
        $batch = (int) $_POST['batch'];

        $row = ($batch * 20) + 1;
        $rows = ($batch + 1) * 20;
    
        if($batch == 0) {
            $row = 2;
            $rows = 20;
        }
        $initalRow = ( $row - 1);

        // max rows reached
        if($rows > $_POST['rows']) {
            $rows = $_POST['rows'];
        }

        $writer = 'Xlsx';

        $useExcel2007 = $this->get_option('excel2007');
        if($useExcel2007 == "1") {
            $writer = 'Xls';
        }

        $file = str_replace('avada//avada', 'avada', $file);
        $file = str_replace('//', '/', $file);

        try {
            $objReader = IOFactory::createReader($writer);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($file);

            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestColumn = $objWorksheet->getHighestColumn(); 
            $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn); // PHPExcel_Cell::columnIndexFromString($highestColumn); 

            $stores = array();
            $keys = array();

            for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                $keys[$col] = $objWorksheet->getCellByColumnAndRow($col, 1)->getValue();
                continue;
            }   

            for ($row; $row <= $rows; $row++) {
                for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                    $stores[$row][$keys[$col]] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                }   
                $firstLine = false;
            }
            
            $possibleCategories = get_terms(array( 'taxonomy' =>'store_category', 'hide_empty' => false));
            $possibleFilters = get_terms(array( 'taxonomy' =>'store_filter', 'hide_empty' => false));

            if(empty($stores)) {
                $this->notice .= 'No Stores found<br/>';
            }

            $tryToFetchLatLng = false;
            $apiKey = $this->get_option('serverApiKey');
            if(!empty($apiKey)) {
                $tryToFetchLatLng = true;
                $GMapsGeocode = new GMapsGeocode($apiKey);
            }

            $i = 0;
            foreach ($stores as $store) {
                $i++;
                $initalRow++;

                $prefix = 'wordpress_store_locator_';

                $this->notice .= 'Row ' . $initalRow . ': ';

                if(empty($store['name'])) {
                    $this->notice .= 'Skipped: No Store Name in line.<br/>';
                    continue; 
                }

                if(empty($store['description'])) {
                    $store['description'] = " ";
                }

                if($tryToFetchLatLng) {
                    if(empty($store['lat']) || empty($store['lng'])) {
                        $address = $store['address1'] . ' ' . $store['address2'] . ', ' . $store['zip'] . ' ' . $store['city'] . ', ' . $store['region'] . ', ' . $store['country'];

                        $getLatLng = $GMapsGeocode->setAddress($address)->setComponents(array(
                                        'locality' => $store['city'],
                                        'country' => $store['country'],
                                    ))->search();
                        if( isset($getLatLng[0]) && !empty($getLatLng[0]) &&
                            isset($getLatLng[0]['geometry']['location']['lat']) && !empty($getLatLng[0]['geometry']['location']['lat'])
                        ) {
                            $store['lat'] = $getLatLng[0]['geometry']['location']['lat'];
                            $store['lng'] = $getLatLng[0]['geometry']['location']['lng'];
                            $this->notice .= 'Updated lat / lng for line: ' . $initalRow . '<br/>';
                        } else {
                            $this->notice .= 'Could not find lat / lng for line: ' . $initalRow . '<br/>';
                        }
                    }
                }

                if(isset($store['status'])) {
                    if(!in_array($store['status'], array('publish', 'draft', 'pending', 'private', 'trash') ) ) {
                        $this->notice .= 'Post status not allowed for row ' . $initalRow . ' > Skipping. <br/>';
                        continue;
                    }
                }

                $post = array(
                    'post_title' => $store['name'],
                    'post_content' => $store['description'],
                    'post_status' => isset($store['status']) ? $store['status'] : 'publish',
                    'post_type' => 'stores',
                    'meta_input' => array(
                        $prefix . 'address1' => $store['address1'],
                        $prefix . 'address2' => $store['address2'],
                        $prefix . 'zip' => $store['zip'],
                        $prefix . 'city' => $store['city'],
                        $prefix . 'region' => $store['region'],
                        $prefix . 'country' => $store['country'],
                        $prefix . 'telephone' => $store['telephone'],
                        $prefix . 'mobile' => $store['mobile'],
                        $prefix . 'fax' => $store['fax'],
                        $prefix . 'email' => $store['email'],
                        $prefix . 'website' => $store['website'],
                        $prefix . 'premium' => $store['premium'],
                        $prefix . 'ranking' => $store['ranking'],
                        $prefix . 'online' => $store['online'],
                        $prefix . 'offline' => $store['offline'],
                        $prefix . 'customerId' => $store['customerId'],
                        $prefix . 'icon' => $store['icon'],
                        $prefix . 'lat' => str_replace(',', '.', $store['lat'] ),
                        $prefix . 'lng' => str_replace(',', '.', $store['lng'] ),
                        $prefix . 'map' => $store['lat'] . ',' . $store['lng'] . ',14',

                        // Opening Hours
                        $prefix . 'Monday_open' => $store['Monday_open'],
                        $prefix . 'Monday_close' => $store['Monday_close'],
                        $prefix . 'Tuesday_open' => $store['Tuesday_open'],
                        $prefix . 'Tuesday_close' => $store['Tuesday_close'],
                        $prefix . 'Wednesday_open' => $store['Wednesday_open'],
                        $prefix . 'Wednesday_close' => $store['Wednesday_close'],
                        $prefix . 'Thursday_open' => $store['Thursday_open'],
                        $prefix . 'Thursday_close' => $store['Thursday_close'],
                        $prefix . 'Friday_open' => $store['Friday_open'],
                        $prefix . 'Friday_close' => $store['Friday_close'],
                        $prefix . 'Saturday_open' => $store['Saturday_open'],
                        $prefix . 'Saturday_close' => $store['Saturday_close'],
                        $prefix . 'Sunday_open' => $store['Sunday_open'],
                        $prefix . 'Sunday_close' => $store['Sunday_close'],

                        $prefix . 'Monday_open2' => $store['Monday_open2'],
                        $prefix . 'Monday_close2' => $store['Monday_close2'],
                        $prefix . 'Tuesday_open2' => $store['Tuesday_open2'],
                        $prefix . 'Tuesday_close2' => $store['Tuesday_close2'],
                        $prefix . 'Wednesday_open2' => $store['Wednesday_open2'],
                        $prefix . 'Wednesday_close2' => $store['Wednesday_close2'],
                        $prefix . 'Thursday_open2' => $store['Thursday_open2'],
                        $prefix . 'Thursday_close2' => $store['Thursday_close2'],
                        $prefix . 'Friday_open2' => $store['Friday_open2'],
                        $prefix . 'Friday_close2' => $store['Friday_close2'],
                        $prefix . 'Saturday_open2' => $store['Saturday_open2'],
                        $prefix . 'Saturday_close2' => $store['Saturday_close2'],
                        $prefix . 'Sunday_open2' => $store['Sunday_open2'],
                        $prefix . 'Sunday_close2' => $store['Sunday_close2'],
                    ),
                );

                $customFields = $this->get_option('showCustomFields');
                if(!empty($customFields)) {

                    foreach ($customFields as $customFieldKey => $customFieldName) {

                        $originalCustomFieldKey = $customFieldKey;
                        $customFieldKey = $prefix . $customFieldKey;

                        if(isset($store[$originalCustomFieldKey])) {
                            $post['meta_input'][$customFieldKey] = $store[$originalCustomFieldKey];
                        }
                    }
                }

                $check_exists = 0;
                if($this->try_update) {

                    // Check by Customer ID
                    if(!empty($store['customerId'])) {

                        $args = array(
                            'meta_key' => $prefix . 'customerId',
                            'meta_value' => $store['customerId'],
                            'post_type' => 'stores',
                            'post_status' => 'any',
                            'posts_per_page' => -1
                        );
                        $store_exists = get_posts($args);
                        if(!empty($store_exists)) {
                            $check_exists = $store_exists[0]->ID;
                            $post['ID'] = $store_exists[0]->ID;
                            $post_id = wp_update_post($post, true);
                        // Store ID Fallback
                        } elseif(!empty($store['id'])) {

                            $check_exists = get_post($store['id']);
                            if(!empty($check_exists)) {
                                $post['ID'] = $check_exists->ID;
                                $post_id = wp_update_post($post, true);
                            } else {
                                $post_id = wp_insert_post($post, true);
                            }
                        } else {
                            $post_id = wp_insert_post($post, true);
                        }

                    // Check by Store ID
                    } elseif(!empty($store['id'])) {

                        $check_exists = get_post($store['id']);
                        if(!empty($check_exists)) {
                            $post['ID'] = $check_exists->ID;
                            $post_id = wp_update_post($post, true);
                        } else {
                            $post_id = wp_insert_post($post, true);
                        }

                    // Check by Store Name
                    } else {

                        $check_exists = post_exists( $store['name'] );
                        if($check_exists !== 0) {
                            $post['ID'] = $check_exists;
                            $post_id = wp_update_post($post, true);
                        } else {
                            $post_id = wp_insert_post($post, true);
                        }
                    }
                } else {
                    $post_id = wp_insert_post($post, true);
                }

                if(is_wp_error($post_id)) {
                    $this->notice .= 'Store: ' . $store['name'] . ' error: <br/>' . print_r($post_id, true) . '<br/><br/>'; //$post_id->get_error_m‌​essage();
                    continue;
                } else {
                    if($check_exists !== 0) {
                        $this->notice .= 'Store ' . $post_id . ': ' . $store['name'] . ' (' . $store['address1'] . ') successfully updated<br/>';
                    } else {
                        $this->notice .= 'Store ' . $post_id . ': ' . $store['name'] . ' (' . $store['address1'] . ') successfully imported<br/>';
                    }
                }

                $filters = array();
                foreach ($possibleFilters as $possibleFilter) {
                    $filter = $possibleFilter->slug;

                    if(isset($store[$filter]) && $store[$filter] == 1)
                    {
                        $filters[] = $filter;
                    }
                }
                wp_set_object_terms( $post_id, $filters, 'store_filter' );
                
                $categories = array();
                foreach ($possibleCategories as $possibleCategory) {
                    $category = $possibleCategory->slug;
                    
                    if(isset($store[$category]) && $store[$category] == 1)
                    {
                        $categories[] = $category;
                    }
                }
                wp_set_object_terms( $post_id, $categories, 'store_category' );
            }
        } catch (Exception $e) {
            $this->notice = 'Your file seems to be corrupt.<br/>' . $e->getMessage();
        }
        $update_taxonomy = 'store_filter';
        $get_terms_args = array(
                'taxonomy' => $update_taxonomy,
                'fields' => 'ids',
                'hide_empty' => false,
                );

        $update_terms = get_terms($get_terms_args);
        wp_update_term_count_now($update_terms, $update_taxonomy);
        $this->notice(true);
    }

    public function notice($return = true)
    {
        $response = array(
            'return' => $return,
            'message' => $this->notice,
            'file' => $this->file,
            'rows' => $this->rows,
            'columns' => $this->columns,
        );

        echo json_encode($response);
        die();
    }
}