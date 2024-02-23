# Changelog
======
2.2.1
======
- NEW:	The ": " was removed from the data title
		Please add it yourself in data to show settings
		E.g. "Website" will become "Website: "
- NEW:	Using gestureHandling cooperative (ctrl + zoom)
- NEW:	Single store page show title & contact in address
- FIX:	Store listing responsive issue
- FIX:	Updated translations
- FIX:	Append City showing when empty city
- FIX:	PHP 8.2 support

======
2.2.0
======
- NEW:	WooCommerce Product Retailers integration
		https://www.welaunch.io/en/knowledge-base/faq/show-online-where-to-buy-in-physical-stores/
- NEW:	Filter dependencies by filter
		https://imgur.com/a/GAj0Tlt
- NEW:	Set lat / lng per filter value
		https://imgur.com/a/lHJPBkc
- NEW:	List stores orderby distance
		https://imgur.com/a/O9ktVTA
- NEW:	CUstom template 15
- NEW:	Show results as slider
- NEW:	Show empty filters (advanced settings)
- NEW:	Hide stores by default parameter
		hide_stores_on_first_view
- NEW:	Updated translation files & added german formal
- FIX:	Dragged button mobile position
- FIX:	Store locator listing JS issue with subregions
- FIX:	Store listing sort by distance with multiple listings
- FIX:	WPM key searchBoxResetFiltersText missing

======
2.1.12
======
- FIX:	Hotfix

======
2.1.11
======
- FIX:	PHP 8 error

======
2.1.10
======
- FIX:	CSS not rendering

======
2.1.9
======
- NEW:	Contact All Stores
		https://imgur.com/a/lbLGMe3
- NEW:	Select input type shows also in search store shortcode
		https://imgur.com/a/U9Bwj0t
- NEW:	Custom CSS file is no longer used (using inline CSS now)
- FIX:	Loading the Google Maps JavaScript API without a callback is not supported
- FIX:	Email show on single store page even when disabled

======
2.1.8
======
- NEW:	Layout paramter for list shortcode
		https://imgur.com/a/WaoMC1b
- NEW:	Move rating form to the bottom (below Map)
		https://imgur.com/a/h9wiONK
- NEW:	Added an option to exclude woocommerce product categories
- NEW:	Added PL
- NEW:	Added new filters:
		wordpress_store_locator_single_store_categories
		wordpress_store_locator_single_store_filter
		wordpress_store_locator_single_store_content
		wordpress_store_locator_single_store_address
		wordpress_store_locator_single_store_contact
		wordpress_store_locator_single_store_additional_information
		wordpress_store_locator_single_store_opening_hours
		wordpress_store_locator_single_store_opening_hours2
		wordpress_store_locator_single_store_contact_store
		wordpress_store_locator_single_store_review
		wordpress_store_locator_single_store_map
- FIX:	Display flex when filter active by default instead of show
- FIX:	Single store page map alignment
- FIX:	Using grid system for store locator listing shortcode
- FIX:	Listing icons were reverse
- FIX:	Multiple pre defined filters not working
- FIX:	Updated Italian Translation

======
2.1.7
======
- NEW:	Moved Import & Export Stores to Store Locator Menu
- NEW:	Export stors by country and delete
		https://imgur.com/a/HbXudfM

======
2.1.6
======
- NEW:	Added BR tag for 2nd Address
- NEW:	PHP 8.1 Support
- FIX:	performance issues

======
2.1.5
======
- FIX:	Fatal error in AJAX trim function

======
2.1.4
======
- NEW:	Filter badges show in infowindow
		https://imgur.com/a/4bOqhJc
- NEW:	Listing shortcode shows image
		https://imgur.com/a/tK5KUa5
- NEW:	Show Chat button
		https://imgur.com/a/IbT4YGV
- NEW:	Option to enable / disable "Append City to Store Name"
		https://imgur.com/a/FDkp9hD
- NEW:	Listing shortcode shows description
- NEW:	Added support for GDPR plugins like Borlabs
- NEW:	Added order & orderby arguments to listing shortcode
- NEW:	Show minimum results
		https://imgur.com/a/b5pNVhL
- NEW:	When importing transform comma into dot automatically
- FIX:	mail-foward icon deprecated in font awesome
		replaced with paper-plane
- FIX:	Do not load font awesome also in Backend
- FIX:	PArent filter name shows in result
- FIX:	Show category filter before normal filter
- FIX:	Store locator list columns not working
- FIX:	Support for multiple uses of nearest_store shortcode
- FIX:	Updated all composer dependencies

======
2.1.3
======
- NEW:	Replaced extreme GEO IP service with geojs.io (free)
- NEW:	Set a default lat, lng & zoom level on shortcode level
		https://www.welaunch.io/en/knowledge-base/faq/wordpress-store-locator-shortcodes/
- NEW:	Disable the User geolocation alert message
		https://imgur.com/a/mkPbYIc
- NEW:	Pressing enter works to find stores (when autocomplete is disabled)
- NEW:	Export & Import store status (allowed: publish, draft, private, pending, trash)
		https://imgur.com/a/m5SHYIa
- NEW:	When auto geolocation alert message disable, use default lat / lng data
- FIX:	Conflict with our Multi Inventory Plugin
- FIX:	Map not showing on shortcode listing pages
- FIX:	Using manage_options for access level now

======
2.1.2
======
- NEW:	Online Stores & Offline Retailers Filter
		https://imgur.com/a/2WsRDaX
- NEW:	Added support for our Multi Inventory Plugin
		That you can select an inventory from our Maps plugin
		https://www.welaunch.io/en/product/woocommerce-multi-inventory/
		https://imgur.com/a/qtmoT8Y
- NEW:	Template 14
- NEW:	Set custom Radius Circle Stroke & Fill Color
		https://imgur.com/a/Jf3tC3N
- NEW:	Moved below address fields to a new setting
		https://imgur.com/a/oKuSL31
- NEW:	Change the query operator for filters:
		https://imgur.com/a/iCWpUUA

======
2.1.1
======
- NEW:	Search Stores along a route:
		https://imgur.com/a/0OkflAA
- NEW:	Reset filters & added icons:
		https://imgur.com/a/nCo8rpD
- NEW:	You can now Open & Close the Result listing
		https://imgur.com/a/uZ4NmE4
- NEW:	Adjusted the Text for get positition click, but denied HTML5 Geolocation
		Make sure IP Gelocation fallback is disabled
- FIX:	Marker cluster showed old stores after filtering


======
2.1.0
======
- NEW:	Store Locator List Shortcode
		https://www.welaunch.io/en/knowledge-base/faq/list-stores-shortcode/
		Demo: https://demos.welaunch.io/wordpress-store-locator/simple-stores-list/
- NEW:	Enable / Disable the single store page
		https://imgur.com/a/1Qn5jD5
- NEW:	Set custom single store icon
		https://imgur.com/a/XLMLjVG
- NEW:	Added a live location feature on single store pages
		https://imgur.com/a/PndOO6O
- NEW:	Find on Map Headline on single store pages
		https://imgur.com/a/T3reJW6
- NEW:	Live location button & hide map headline when no live location
		https://imgur.com/a/X55S7va
- NEW:	Show custom field data after address
		https://imgur.com/a/jl8ejzu
- NEW:	Disable Google Maps Control UI Elements
		https://imgur.com/a/bR4Germ
- NEW:	Infowindow contact buttons moved to the bottom
- FIX:	Infowindow no line breaks
- FIX:	Zoom result list item disabled by default
- FIX:	Comma showing in single store page when country removed

======
2.0.18
======
- NEW:	Zoom to result list item
- FIX:	uncautgh S php error in some languages

======
2.0.17
======
- FIX:	Language translations not appearing
- FIX:	Escaped all strings
- FIX:	Changed batches import to 20 instead of 100

======
2.0.16
======
- NEW:	Added Translation files for
		Italian, German, French, Spanish, Dutch
- NEW:	Applied basic stylings for better theme support
- FIX:	Filter chevron by default open wrong
- FIX:	Added background color to import log
- FIX:	Single store description wrapped into store locator columns 12

======
2.0.15
======
- NEW:	Store Locator importer uses AJAX functionality to support
		large file imports + avoid timeouts
- NEW:	When using images to show in the store locator it is linked to your
		result list / infowindow action

======
2.0.14
======
- NEW:	Map Marker Clustere Functionality
		https://imgur.com/a/kJ7HAeW
- NEW:	Email placeholder functionality
		https://imgur.com/a/lRyT4ns
- FIX:	Default store map marker in export file corrected
- FIX:	Single store map not showing

======
2.0.13
======
- NEW:	Many new parameters added to our shortcode
		See updated shortcode docs:
		https://www.welaunch.io/en/knowledge-base/faq/wordpress-store-locator-shortcodes
- NEW:	default_address parameter for store locator shortcode
		https://imgur.com/a/JP04I0f
- NEW:	default_category and default_filters (comma seperated) for shortcode
		https://imgur.com/a/soGvM6k
- NEW:	Beside "categories" you can now also set "filters" in the shortcode
		filter parameter MUST contain also the parent filter ID
- NEW:	Search by store name now work with address combination
		e.g. You can search for Store with name "Music" in "Los Angeles"
- NEW:	Excerpt support for stores
		https://imgur.com/a/5BMo6kA
- NEW:	Store locator search shortcode accepts button_text argument
- NEW:	No stores text is now a paragraph and no longer a h4
- NEW:	Single store page cols added
- FIX:	Readded PHP 5.6 support (You should upgrade - it is 2021)
- FIX:	Categories selector showed when not categories created
- FIX:	Predefined query string filters not working
- FIX:	PHP notice for product categories array

======
2.0.12
======
- NEW:	Change the query operator for filters (AND or OR)
		https://imgur.com/a/28Zko1m
- FIX:	Selected category icon not shown

======
2.0.11
======
- NEW:	Store locator listing value, subvalue, orderby and open_by_default arguments
		https://imgur.com/a/Jv6vP1z
- NEW:	PHP 8.0 Support
- FIX:	Updated all vendor libraries
- FIX:	Default Home icon returned a 404
		New one: https://demos.welaunch.io/wordpress-store-locator/wp-content/uploads/sites/11/2021/03/home2.png
		Make sure you change it in Plugin Settings > Map
- FIX:	Layout 8 not working
- FIX:	Posts per page -1 for listing

======
2.0.10
======
- NEW:	Store locator listing accepts now a subkey
		so you can group by country > state
		https://imgur.com/a/BbuVPGr
- NEW:	Store name search disabled by default
- NEW:	Output buffering enabled by default
- FIX:	Removed emulate transition
- NEW:	Modal size normal & default now

======
2.0.9
======
- NEW:	Disable bootstrap will only remove JS bootstrap
- FIX:	Keep Filter when all Stores clicked not removed loading
- FIX:	Added performance to WPML keys (performanceRenderOnThesePages)

======
2.0.8
======
- FIX:	Moved updater into weLaunch framework

======
2.0.7
======
- NEW:	Dropped Redux Framework support and added our own framework 
		Read more here: https://www.welaunch.io/en/2021/01/switching-from-redux-to-our-own-framework
		This ensure auto updates & removes all gutenberg stuff
		You can delete Redux (if not used somewhere else) afterwards
		https://www.welaunch.io/updates/welaunch-framework.zip
		https://imgur.com/a/BIBz6kz
- FIX:	Result list height not full height as map
- FIX:	PHP 5.6 support

======
2.0.6
======
- NEW:	Added autocomplete fields options to lower the requests (save you money)
- FIX:	Replaced google.com with googleapis.com domain to comly to GDPR (no cookies)

======
2.0.5
======
- NEW:	Option to hide distance when all stores button clicked
- FIX:	Visit store button icon not visible
- FIX:	Transparency from loading not possible

======
2.0.4
======
- NEW:	Custom result list order for "all stores"
- FIX:	Upgraded bootstrap JS to version 4.5.3

======
2.0.3
======
- FIX:	Layouts broken
- FIX:	Loading indicator not showing

======
2.0.2
======
- NEW:	Upgraded to bootstrap 4
- NEW:	When closing filter the result list adjusts height automatically (when enabled)
- FIX:	No results had no column container
- FIX:	Added spacing for show all stores

======
2.0.1
======
- FIX:	Breadkpoints for 13 layout changed
- FIX:	Fallback if sorting field could not be saved in backend

======
2.0.0
======

!IMPORTANT! Make sure you double check layout + search + filter settings after update!

- NEW:	Reorder and disable search box fields
		https://imgur.com/a/4ogRChP
- NEW:	Reorder and disable filter fields
		https://imgur.com/a/pSD5GvY
- NEW:	3 More Layouts
		https://imgur.com/a/ZCV5Rt2
- NEW:	Custom Layout 13
- NEW:	Auto height for result list can be disabled
- NEW:	Auto Heigth for map can be disabled & custom height applied
		https://imgur.com/a/HTS9ZNz
- NEW:	Single Store page settings including custom zoom level on single store page
		https://imgur.com/a/L1qBwow
- NEW:	Image top Position
- NEW:	max_radius argument for wordpress_store_locator shortcode 
		[ wordpress_store_locator max_radius="yes"]
		Will preselect max radius
- NEW:	Filter for JS options "wordpress_store_locator_options"
- NEW:	Store locator listing now also accept taxonomy "story_category" & "store_filter"
		https://imgur.com/a/aHDhn9O
- NEW:	All Stores link now can still keep categories filtered
		https://imgur.com/a/WVyMIB3
- FIX:	PHP Notices
- FIX:	Infinte loading in store result list caused by rating
- FIX:	Updated POT / PO Files

======
1.13.2
======
- NEW:	Strip shortcodes & Visual Composer shortcode support
		for description https://imgur.com/a/2pqRBfN

======
1.13.1
======
- FIX: 	Store import did not delete previous selected categories / filters

======
1.13.0
======
- NEW:	Create custom Store Fields 
		These will be used in result list, infowindow, single store page
		can be added in backend, im- and exported
		https://imgur.com/a/TpPhSdz
- NEW:	Store locator listing
		https://imgur.com/a/R5oVNJU
		Live Demo: https://demos.welaunch.io/wordpress-store-locator/store-locator-listing/
- NEW:	Store Locator Layout section for easier store designs including 9 Layouts
		https://imgur.com/a/JmMJZU5
- NEW:	Created 3 new possible layouts
- NEW:	Categories title no longer displays when empty
- NEW:	Reviews title is now sticky
		https://imgur.com/a/tKJC3LQ
- FIX:	Infinite loop in rating display
- FIX:	PHP Notices
- FIX:	Countries now translateable
- FIX:	Updated Translations

======
1.12.1
======
- NEW:	Option to disable replace state in URL
		See advanced settings

======
1.12.0
======
- NEW:	Star ratings for Stores
		https://imgur.com/a/o4eNBek
- FIX:	PHP Notices


======
1.11.5
======
- NEW:	Big Performance Release 
		!! MAKE SURE YOU ARE ON LATEST VERSION OF REDUX FRAMEWORK !!
- NEW:	Rate / Review stores on single store pages

======
1.11.4
======
- NEW:	YOu can disable font awesome loading in advanced settings now
- FIX:	Font Awesome 5 sperately loaded
- FIX:	Default option icons changed

======
1.11.3
======
- FIX:	WooCommerce category linking not working

======
1.11.2
======
- FIX:	Icons not visible changed "fa" to "fas"

======
1.11.1
======
- NEW:	Added tel field to contact store phone & mobile html field

======
1.11.0
======
- NEW:	Added 4 new parameters to "wordpress_store_locator_nearest_store" shortcode
		show_name="true" 
		text_separator=" | " 
		show_opening="false" 
		text_before="Nearest Store: "
		denied_text="Please enable Geolocation"
		Example: [wordpress_store_locator_nearest_store show_name="true" text_separator=" | " show_opening="false" text_before="Nearest Store: " denied_text="Please enable Geolocation"]
- NEW:	Show all button now takes default lat / lng for searching
- FIX:	Show all stores not respected the sorting
- FIX:	Store locator dragged button not aligned in some themes
- FIX:	Update POT file
- FIX:	Nearest store output buffering support

======
1.10.9
======
- NEW:	Performance (only render JS and CSS on these pages)
		https://imgur.com/a/IIbH5Rl
- FIX:	Export stores fix
- FIX:	Removed bootstrap CDN font awesome

======
1.10.8
======
- NEW:	Data used for contact form is now no longer dependant 
		on the date your show in your store locator data to show settings.

======
1.10.7
======
- NEW:	Added an option to show multiple result list items in 1 row (result list item columns)
		Example: https://imgur.com/a/BG4etWe

======
1.10.6
======
- FIX:	Store locator hidden class 
- FIX:	PHP notice

======
1.10.5
======
- NEW:	Search by Store Name input field
		Examples: https://imgur.com/a/YYXyOSh

======
1.10.4
======
- NEW:	Added a new file called "customer ID" for each store
		This field will be im / exported and visible only in backend
		It can be used to update stores based on this field value 
		(e.g. you can use this for CRM ID)
- FIX:	Default icon not fallback when hovering over 

======
1.10.3
======
- NEW:	If only 1 catgory specified in shortcode and image used for categories the one category will be selected by default
- FIX:	Category store badges not showing

======
1.10.2
======
- NEW:	Filter on single store pages now shows filter parent title first (e.g. Colors: blue, black)
- NEW:	Images assigned to category filter now also show in the result list & single store page
- NEW:	3 Column Layout for result list item
		See: https://imgur.com/a/IbShuUc
- FIX:	Moved deprecated show / hide filter section to result list settings

======
1.10.1
======
- NEW:	Radius max of 3999 removed

======
1.10.0
======
- NEW:	Empty address field by default (see settings > search box)
- NEW:	Added subtitles to options panel
- NEW:	An error message now shows if the custom CSS file is not writeable
- NEW:	Added an option to show / hide categories
- NEW:	Added an option to show / hide filters separatly
- NEW:	Added an option to show / hide the radius filter
- NEW:	Added a CSS class for filter section
- FIX:	Changed "get direction" to "get directions" text
- NEW:	Added Premium Class to Infowindow
- FIX:	Premium Class missing in result list

======
1.9.10
======
- FIX:	DB prepare error in AJAX function
- FIX:	PHP notice issue

======
1.9.9
======
- FIX:	Updated missing DE Translations
- FIX:	PHP Notice: Undefined variable: values
- FIX:	Max Result changed from 999 to 99999
- FIX:	Default max results set higher

======
1.9.8
======
- NEW:	Updated DE Translations (big thanks to motivmedia)
- FIX:	Opening hours o clock 2 text showed for 1 in result list

======
1.9.7
======
- FIX:	Admin Search returns stores multiple times
- FIX:	Empty post meta was not deleted
- FIX:	Mobile infowindow content cutt off

======
1.9.6
======
- FIX:	Show for store category option not saved

======
1.9.5
======
- FIX:	Multiple PHP notices

======
1.9.4
======
- NEW:	Moved "Find in Store" option to general settings for better visibility
- FIX:	undefined variable term PHP notice

======
1.9.3
======
- FIX:	IMPORTANT: GEO IP service changed - update required!

======
1.9.2
======
- NEW:	You can now search for stores in backend with meta values like address, city

======
1.9.1
======
- NEW:	Show Parent Store filters only when a specific product category is selected
		In backend when editing a filter see: Show for Store Category
- NEW:	Input type is hidden for child filters as they are only possible on filter top level
- NEW:	Added support for importing / exporting opening hours 2
- NEW:	ID gets now exported and can be used to update stores during import
- FIx:	Store categories & filters not exported
- FIX:	Ranking + Premium meta data not saved caused issue with premium sorting

======
1.9.0
======
- NEW:	Opening Hours 2 option to show 2 different opening hours
- NEW:	Opening Hours text displays on single store pages
- NEW:	Shortcode to display nearest store:
		[wordpress_store_locator_nearest_store text_before="Nearest Store: "]
		Args: text_before
		Output: Shows nearest store "address, city | opening hours"
- NEW:	Option to disable the open infowindow on mouseover the marker (only open on click)
- NEW:	Option to link filters & categories to WooCommerce Product Industries taxonomy
- FIX:	Updated POT File

======
1.8.8
======
- NEW:	 Added new action hooks:
		wordpress_store_locator_before
		wordpress_store_locator_before_main
		wordpress_store_locator_after_main
		wordpress_store_locator_after
		wordpress_store_locator_sidebar
		wordpress_store_locator_after_sidebar
		wordpress_store_locator_before_search_box
		wordpress_store_locator_before_active_filters
		wordpress_store_locator_after_active_filters
		wordpress_store_locator_before_address_field
		wordpress_store_locator_after_address_field
		wordpress_store_locator_after_search_box
		wordpress_store_locator_before_filters
		wordpress_store_locator_after_filters
- FIX:	Data to show for contact details hide on single store pages
- FIX:	Category filters, that are display as images did not show up in active filters

======
1.8.7
======
- NEW:	Visit Store Button that links to the single store page

======
1.8.6
======
- FIX:	Premium sorting, non premium stores now sorted by distance

======
1.8.5
======
- FIX:	badge Class html wrong
- FIX:	Your position not translateable
- FIX:	Updated POT files

======
1.8.4
======
- NEW:	Autocomplete Restriction now works for multiple countries
		Enter DE,CH for example to limit to Germany & Switzerland

======
1.8.3
======
- NEW:	Option to leave out the get direction source address
		Data to Show > Leave source address empty in Google Maps

======
1.8.2
======
- NEW:	Added store-locator-is-premium CSS Class to details container
- FIX:	Distance showed twice
- FIX:	Weekdays not translateable on single store pages

======
1.8.1
======
- NEW:	Added a filter for options "wordpress_store_locator_options"
- FIX:	Infowindow width switched to max-width (better mobile support)
- FIX:	Added Max height for Infowindow
- FIX:	Updated Documentation to latest version

======
1.8.0
======
- NEW:	When editing a parent filter in wp-admin you can set the input type
		from checkbox to select field. 
- FIX:	URL query duplication
- FIX:	Admin CSS issue
- FIX:	Added CSS class to filters
- FIX:	Query issue for premium stores

======
1.7.24
======
- FIX:	Geocode Address now respects componentRestrictions
- FIX:	Performance improvment

======
1.7.23
======
- FIX:	Build State Replace now does not remove existing query strings
- FIX:	Query all stores not working when result order was Premium
- FIX:	Removed old plugins

======
1.7.22
======
- NEW:	Added an option to set new window / blank for store link actions

======
1.7.21
======
- FIX:	store_id parameter wrong when Contact Store URL containes a Query Parameter

======
1.7.20
======
- FIX:	Auto Geolocation showed on search for store shortcode even when disabled
- FIX:	IMPORTANT! Replaced geolocation service provider

======
1.7.19
======
- FIX:	Uncaught Error: Class 'PHPExcel_Cell' not found 

======
1.7.18
======
- NEW:	Removed phpoffice/phpexcel (deprecated) and moved to phpoffice/spreadsheet
- FIX:	Single Store pages showed data not activated

======
1.7.17
======
- NEW:	Added a class to the "store in XX" so you can hide it via
		CSS: wordpress-store-locator-store-in
- NEW:	Renamed "button" to "WooCommerce" in Backend

======
1.7.16
======
- FIX:	Select Store not translateable in contact form

======
1.7.15
======
- NEW:	Option to enable / disable Auto IP Geolocation Fallback due to GDPR
		when HTML5 not supported or disallowed
- FIX:	Increased the timeout to 8 seconds until IP Geolocation fallback used

======
1.7.14
======
- FIX:	Maps icons missing in Internet Explorer (IE)

======
1.7.13
======
- NEW:	Added an option to set the Show All Stores Text
- FIX:	Google Maps Icon not visible
- FIX:	Multiple AJAX calls if no address set in URL
- FIX:	Fallback for no HTML5 Geolocaiton enabled

======
1.7.12
======
- FIX:	When address in URL the location field got overwritten
- FIX:	Store Link now by get_permalink

======
1.7.11
======
- NEW:	Added a ranking option for stores to sort by (the higher the better)
		You can edit stores to set a ranking or import stores
		Make sure you set Sort Order to Ranking in plugin settings > Result list
- FIX:	When rankings are the same it orders by distance

======
1.7.10
======
- FIX:	Improved the automatic lat / lng fetching process

======
1.7.9
======
- NEW:	Added do_shortcode on store description
- FIX:	Weekdays Key was translated also

======
1.7.8
======
- NEW:	Full Height Map
		See Settings > Map > Full Height Map

======
1.7.7
======
- NEW:	Get my Position works on search for store shortcode
- FIX:	Added loading hint when get my position clicked

======
1.7.6
======
- FIX:	Updated Default settings
- FIX:	Added button class for Divi Themes

======
1.7.5
======
- NEW:	Lat / Lng data now available in store overview (easiy to check if data missing)
- FIX:	Predefined Category has overwritten category by URL

======
1.7.4
======
- NEW:	! Important Update !
		As of 1st of July the old geoip provider we used "https://freegeoip.net/json/" 
		is no longer available, we switched to a new one: "https://geoip.nekudo.com/"
		You need to update our plugin otherwise it won't work anymore after 1st of July
- NEW:	Radius now also in URL PushState HTML5
- FIX:	jQuery attr changed for prop
- FIX:	Image Filter now also works with URL PushState
- FIX:	Radius Circle JS error for all stores link

======
1.7.3
======
- NEW:	URL PushState HTML5
		The users search (address, category + filters) will
		be stored in the URL. This can be shared then
- FIX:	Radius Circle JS Error
- FIX:	Multiple Locations

======
1.7.2
======
- NEW:  Display Distance in Result List
- FIX:  Issue when ordering was set to premium and all stores fetched

======
1.7.1
======
- FIX:	Missing translation "Enter your Address" added

======
1.7.0
======
- FIX:  Tax Meta Class Updated

======
1.6.9
======
- NEW:  Option for Infowindow Open check to prevent twiches
		See Settings > Infowindow > Check if Infowindow is closed
- FIX:  Icon Hover Fix
- FIX:  JS Code improvements
- FIX:  Renamed Pan to Marker on Mouse Hover => Enable Result List Hover
		Pan to Marker should be set in settings > maps > pan to map

======
1.6.8
======
- NEW:  Map style now also applies on Single Store Page

======
1.6.7
======
- FIX:  Show all stores did not respected the data to show

======
1.6.6
======
- NEW: 	Added an option to show a button "show on map"
		See data to show > Show on Map

======
1.6.5
======
- NEW: Map > Enable / Disable Pan to Marker on Hover
- NEW: Result List > Enable / Disable Pan to Marker on Hover

======
1.6.4
======
- FIX: IE11 Problems

======
1.6.3
======
- NEW:  Option to enable Output Buffering as some themes had problem with displaying

======
1.6.2
======
- FIX:  Moved google maps script to the bottom to avoid conflicts with other maps plugins

======
1.6.1
======
- NEW:  Shortcode to show a search box only, that links to the store locator
		Demo: https://www.welaunch.io/wordpress-store-locator/search-for-store/
		Shortcode: [wordpress_store_locator_search url="YOUR_STORE_LOCATOR_URL" style="1" show_filter="yes"]
- FIX:  Filters not working when premium sorting was checked

======
1.6.0
======
- FIX:  Added output buffering for shortcode used

======
1.5.9
======
- FIX:  renamed import upload file because of theme conflicts

======
1.5.8
======
- NEW:  Check if you want to Adjust zoom level to Radius automatically
- NEW:  Set a link action to "none"

======
1.5.7
======
- NEW:  It is now possible to set the default radius to more than 1000

======
1.5.6
======
- FIX:  Fixed an issue where the zip was not laoded in contact form
- FIX:  Use store_locator_store_info_XX for info on contact page

======
1.5.5
======
- FIX:  Fixed an issue where the loading spinner
		did not got away

======
1.5.4
======
- NEW:  Added a pan to map on store hover

======
1.5.3
======
- FIX:  Fixed an issue where the Show all Stores
		Link did not work without Radius enabled

======
1.5.2
======
- NEW:  Sort stores by Premium Stores first
		See Settings > Result List > Sort Results by
- NEW:  Show image also in Result list 
- NEW:  Set a position (left / right) for store image 
		in result list

======
1.5.1
======
- NEW:  Prefixed all bootstrap files to not get in conflict with themes

======
1.5.0
======
- NEW:  Link stores to custom contact form pages
		You can now add an action to your stores, that 
		will redirect to a contact form with dealer information
		See Settings Data to Show > Show Contact Dealer
		See Tutorial & More Info here: https://www.welaunch.io/wordpress-store-locator/docs/faq/create-store-contact-page/
- NEW:  Show All Stores link
		See Settings > Search Box > Show All stores Button
- NEW:  All Stores Zoom Level
- NEW:  All Stores Default Lat / Lng

======
1.4.6
======
- FIX:  Only 1 store showed in backend

======
1.4.5
======
- FIX:  Removed PHP Notices from Import Class
- FIX:  Removed PHP notice in Public Class

======
1.4.4
======
- NEW:  Option to display category filter as an image
		See Settings > Data To Show > Display Category Filters as Image
		Make sure you have set a category icon in the backend

======
1.4.3
======
- NEW:  Removed Meta Boxes to be required
		From now on we use custom meta data code
- NEW:  Radius Limitation of 999 removed and set to 3999
- FIX:  Removed Google Sensor required console issue

======
1.4.2
======
- FIX:  PHP Notice in php file

======
1.4.1
======
- NEW:  Shortcode attributes to create multiple maps with different categories:
		Example 1: 
		- Only show category ID 34 (T-Shirts) 
		- no children 
		- no "show all categories"
		[wordpress_store_locator categories="34" show_children="no" show_all="no"]
		Example 2:
		- Show Categories 32 (Clothes) and 35 (Music Stores)
		- Show no children
		- Show "all categories"
		[wordpress_store_locator categories="32,35" show_children="no" show_all="yes"]

======
1.4.0
======
- NEW:  Automatic zoom level adjustment when radius changes

======
1.3.9
======
- FIX:  Resultlist Link action issue

======
1.3.8
======
- NEW:  Display opening hours in single store pages
		Example: https://www.welaunch.io/wordpress-store-locator/store/clothes-1/
- NEW:  Red border when address field is empty
- FIX:  Opening hours title showed up when no opening hours were entered

======
1.3.7
======
- NEW:  CSS Classes for active filter
- NEW:  CSS Classes for store filters

======
1.3.6
======
- NEW: 	Show the filter box open by default 
		Settings > Search Box > Filter open by default
- NEW:  Adress format options (standard or American / Australian)
		Settings > Data to Show > Address Format
- NEW: 	Switched from Time field to Text field for opening hours
		Now you can write "closed" for example
- NEW: 	Set a custom infowindow link action
- NEW: 	Show ZIP & Region
		Settings > Data to Show
- FIX: 	Sunday does not display
- FIX: 	Server side API key

======
1.3.5
======
- FIX: undefined variable

======
1.3.4
======
NEW: Logic for icons changed: when a store is in multiple categories 
	 -> Take the first categories icon
FIX: custom category icon could not be uploaded wpColorpicker error
FIX: map icon on result list hover

======
1.3.3
======
- FIX:  Export Stores misses filter categories
- FIX:  Import stores file upload in Multisite environments
- FIX:  Categories & Filter now update the count after import

======
1.3.2
======
- FIX:  PHP 7.1 fix

======
1.3.1
======
- NEW: WPML Support
- NEW: Complete new documentation (see here: https://www.welaunch.io/docs/wordpress-store-locator/)
- NEW: Updated offline documentation
- FIX: Added map Meta key to import 
- FIX: Added Opening hours to Sample Import file
- FIX: Latitute wrongly assigned when importing XLSX without lat / lng
- FIX: Get Sample import file now respects the Excel 2007 option
- FIX: Switched custom store icon from Media Library to raw URL
	   !!! Make sure you change this in your stores settings !!!

======
1.3.0
======
- NEW: Set a custom map icon for a single store
- NEW: Logic for Icons:
		1. If a custom icon on single store is set -> take this
		2. If a custom category icon is set:
		2.1. If a store is only in one category -> take this icon
		2.2. If a store has multiple icons, the icon only changes when a category has been choosen in frontend
		3. If no store / category icon is set -> take the default Icon
- NEW: Improved editing layout in backend
- FIX: Export files are corrupt

======
1.2.9
======
- NEW: Add a custom Icon for store categories
- NEW: Added store categories & filter information on single store page
- FIX: Removed icon from json to increase speed

======
1.2.8
======
- FIX: undefined index in public.php file for meta boxes request

======
1.2.7
======
- FIX: Default Country
- FIX: Import of new stores

======
1.2.6
======
- NEW: Sort by distance or alphabetically (settings > result list > sort by)
- NEW: Try updating stores during import (updating process is checked by store name)
- FIX: Store categories / filters are now sorted alphabetically ASC

======
1.2.5
======
- NEW: Import Store Opening Hours
- NEW: Export Opening Hours
- NEW: Slightly settings panel improvements

======
1.2.4
======
- FIX: DB Prepare statement

======
1.2.3
======
- NEW: Set a default store category to be active (Settings > Search Box > Default filter category)
- NEW: Description now also shows up in result list
- FIX: Description will now be exported correctly
- FIX: Description does not show up when no email was set up

======
1.2.2
======
- NEW:  When importing stores with no Latitute / Longitute (lat / lng) the system will try to fetch the data from Google Reverse Maps
		You will need to set a extra server side API Key this on the settings panel
- FIX: Result list height in the Modal

======
1.2.1
======
- NEW:  Use custom Map Styling (e.g. from https://snazzymaps.com OR https://mapstyle.withgoogle.com/)
		See settings -> Maps -> Styling
- NEW:  Select what happens when a user clicks on the stores name in the result list
		See settings -> Result list -> Link Action

======
1.2.0
======
- NEW: Automatically extend the map if no stores are found
- NEW: Excel files are now .xlsx (for Excel 2007 and higher), but you can still switch to Excel 5 if preferred
- NEW: Hide search Active filter
- NEW: Hide search Filters completley
- NEW: Hide search Title
- FIX: Hardcoded some CSS settings

======
1.1.7
======
- FIX: CSS bug border-box-size

======
1.1.6
======
- NEW: Autocomplete country restriction: restricts the users search only within a specific country
- NEW: Autocomplete type restriction. Only return city or zip code, but never street (specially used in US)
- NEW: Conditional Data loading (e.g. when a store has no email, it will not be ouputted as "undefined")

======
1.1.5
======
- NEW: Support for subcategories in Category Dropdown
- FIX: WP-Admin URL for settings buttons

======
1.1.4
======
- FIX: No Sidebar autoHeight
- FIX: Map Center position

======
1.1.3
======
- FIX: Issue with Sidebar Height
- FIX: Issue with Sidebar position

======
1.1.2
======
- FIX: Button does not show up on single product pages
- FIX: Search in this area button styling

======
1.1.1
======
- Name change to WordPress Store locator
- !!Important!! Before you upgrade make an export of your stores. Then update and import the exported stores. 

======
1.1.0
======
- NEW: Drag the map and a button appear to do a search in this area
- NEW: Stores & Categories can now be shown as items:
- NEW: Single Store: http://wordpress.welaunch.io/store/clothes-1/
- NEW: Store Category: http://wordpress.welaunch.io/store-categories/clothes-stores/
- NEW: Option to hide the get directions link
- NEW: Option to hide the search button
- NEW: Option to set a custom text for the search button
- NEW: Option to hide the result list title
- NEW: Updated Design
- NEW: When set a default position & auto location is disabled it automatically searches there
- NEW: Better Versioning
- FIX: Tel, Email, Web not showing on map
- FIX: Description showed "undefined"

======
1.0.10
======
- FIX: Import issue with categories (not appended, but replaced)

======
1.0.9
======
- NEW: Enter button now works in search field
- FIX: Description will now be shown
- FIX: Premium icon on all result items
- FIX: Versioning for JS / CSS files

======
1.0.8
======
- NEW:  When user declines HTML5 Geolocation or when it is not support, the user will now be 
		located by his IP address using the free service https://freegeoip.net (max. 10.000 requests per hour!)
- FIX: switched the Google Maps "Get Direction" position

======
1.0.7
======
- NEW: Code cleanup
- FIX: capability added for the import page

======
1.0.6
======
- NEW: Better plugin activation
- FIX: Better advanced settings page (ACE Editor for CSS and JS )
- FIX: array key exists

======
1.0.5
======
- FIX: Redux Framework error

======
1.0.4
======
- NEW: Import function for XLS-Files
- NEW: Get Sample Import file (dynamically creates categories / filters too)
- NEW: Export function to XLS
- NEW: Delete all stores

======
1.0.3
======
- FIX: Google new requires API Key for everything 
- FIX: API Key now also provided in backend

======
1.0.2
======
- FIX: error when Meta-Box Plugin was not installed & activated

======
1.0.1
======
- NEW: Removed the embedded Redux Framework AND Meta Boxes for update consistency
//* PLEASE MAKE SURE YOU INSTALL THE REDUX FRAMEWORK & Meta Box PLUGIN *//

======
1.0.0.3
======
- FIX: PHP 5.4 compatible errors

======
1.0.0.2
======
- FIX: Remove close button on shortcode pages
- FIX: when hiding active filters also hide the active filter text

======
1.0.0.1
======
- FIX: Bring back the close button 

======
1.0.0
======
- Inital release