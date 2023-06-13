<?php
/* Global constants for site */
define('FFMPEG_CONVERT_COMMAND', '');

define("ADMIN_FOLDER", "admin/");
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', base_path());
define('APP_PATH', app_path());

define("IMAGE_CONVERT_COMMAND", "");
define('WEBSITE_URL', url('/').'/');
define('WEBSITE_JS_URL', WEBSITE_URL . 'js/');
define('WEBSITE_CSS_URL', WEBSITE_URL . 'css/');
define('WEBSITE_IMG_URL', WEBSITE_URL . 'img/');
define('WEBSITE_UPLOADS_ROOT_PATH', ROOT . DS . 'uploads' .DS );
define('WEBSITE_UPLOADS_URL', WEBSITE_URL . 'uploads/');

define('WEBSITE_ADMIN_URL', WEBSITE_URL.ADMIN_FOLDER );
define('WEBSITE_ADMIN_IMG_URL', WEBSITE_ADMIN_URL . 'img/');
define('WEBSITE_ADMIN_JS_URL', WEBSITE_ADMIN_URL . 'js/');
define('WEBSITE_ADMIN_FONT_URL', WEBSITE_ADMIN_URL . 'fonts/');
define('WEBSITE_ADMIN_CSS_URL', WEBSITE_ADMIN_URL . 'css/');

define('WEBSITE_ADMIN_SERVICE_IMG_URL', WEBSITE_UPLOADS_URL . 'service/');
define('WEBSITE_ADMIN_SERVICE_IMG_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'service' . DS); 

define('WEBSITE_PRICE_IMG_URL', WEBSITE_UPLOADS_URL . 'price/');
define('WEBSITE_PRICE_IMG_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'price' . DS); 

define('WEBSITE_TEAM_IMG_URL', WEBSITE_UPLOADS_URL . 'our_team/');
define('WEBSITE_TEAM_IMG_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'our_team' . DS); 














define('SETTING_FILE_PATH', APP_PATH . DS . 'settings.php');

define('CK_EDITOR_URL', WEBSITE_UPLOADS_URL . 'ck_editor_images/');
define('CK_EDITOR_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'ck_editor_images' . DS); 


define('REVIEW_IMAGE_URL', WEBSITE_UPLOADS_URL . 'reviews/');
define('REVIEW_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'reviews' . DS); 

define('LOCATION_IMAGE_URL', WEBSITE_UPLOADS_URL . 'locations/');
define('LOCATION_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'locations' . DS); 

define('BLOG_IMAGE_URL', WEBSITE_UPLOADS_URL . 'blogs/');
define('BLOG_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'blogs' . DS); 

define('BANNER_IMAGE_URL', WEBSITE_UPLOADS_URL . 'banners/');
define('BANNER_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'banners' . DS);

define('SECTION_IMAGE_URL', WEBSITE_UPLOADS_URL . 'sections/');
define('SECTION_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'sections' . DS);

define('SOFTWARE_PARTNER_IMAGE_URL', WEBSITE_UPLOADS_URL . 'software_partner/');
define('SOFTWARE_PARTNER_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'software_partner' . DS);

define('CERTIFICATE_IMAGE_URL', WEBSITE_UPLOADS_URL . 'certificates/');
define('CERTIFICATE_PARTNER_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'certificates' . DS); 

define('SUB_SERVICES_IMAGE_URL', WEBSITE_UPLOADS_URL . 'sub_services/');
define('SUB_SERVICES_IMAGE_URL_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'sub_services' . DS); 

define('LANGUAGE_IMAGE_URL', WEBSITE_UPLOADS_URL.'language_images/');
define('LANGUAGE_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .'language_images'.DS);

define('SYSTEM_DOCUMENT_URL', WEBSITE_UPLOADS_URL.'system_documents/');
define('SYSTEM_DOCUMENT_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .'system_documents'.DS);

define('USER_PROFILE_IMAGE_URL', WEBSITE_UPLOADS_URL . 'user_profile/');
define('USER_PROFILE_IMAGE_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .  'user_profile' . DS);

define('IMAGE_EXTENSION','jpeg,jpg,png,gif,bmp');
define('IMAGE_EXTENSION_DOCUMENTS','jpeg,jpg,png,gif,bmp,pdf,docx,doc,xls,excel');

define('PRICE_EXTENSION_URL', WEBSITE_UPLOADS_URL.'price_file_doc/');
define('PRICE_EXTENSION_ROOT_PATH', WEBSITE_UPLOADS_ROOT_PATH .'price_file_doc'.DS);

















$config	=	array();

define('ALLOWED_TAGS_XSS', '<a><strong><b><p><br><i><font><img><h1><h2><h3><h4><h5><h6><span><div><em><table><ul><li><section><thead><tbody><tr><td><figure><article>');

define('ADMIN_ID', 1);
define('SUPER_ADMIN_ROLE_ID', 'super_admin');
define('USER_ADMIN_ROLE_ID', 'user_admin');


Config::set('default_language.folder_code', 'eng');
Config::set('default_language.language_code', '1');
Config::set('default_language.name', 'English');

Config::set("Site.currency", "&#2547;");
Config::set("Site.currencyCode", "$");

Config::set('per_page',array('15'=>'15','20'=>'20','30'=>'30','50'=>'50','100'=>'100'));

Config::set('gender', array('male' => 'Male', 'female' => 'Female'));

define('ACTIVE', 1);
define('INACTIVE', 0);
define("PAGE_LIMIT",10);

Config::set('supplier_send_order_options',array('integration' => 'supplier.integration', 'email' => 'supplier.email','sms'=> 'supplier.sms', 'dont_send' => 'supplier.dont_send'));

Config::set('supplier_price_type_options',array('integration' => 'supplier.integration', 'price_file' => 'supplier.price_file'));


Config::set('plan_type_options',array('monthly' => 'plans.monthly', 'yearly' => 'plans.yearly'));

Config::set('price_type_option', array('call_sales'=> 'plans.call_sales','price' => 'plans.price'));


Config::set('supplier_mapping_rules', array("prodId" => "Supplier Item Id","prodDesc"=>"Product Description","aux"=>"Auxiliary Description...","brand"=>"Brand","price"=>"Price","uomDef"=>"Unit Of Measurement Definition...","priceUom"=>"Price for Unit of Measurement...","mult"=>"Multiplier","div"=>"Divider","weight"=>"Weight","case"=>"Case","prodAvail"=>"Product Availability","manCode"=>"Manufacturer Code","manName"=>"Manufacturer Name","upc"=>"UPC"));

Config::set('supplier_multiple_mapping_rules', array("prodId" => ["Supplier Item Id","Item Id","Product Id","Product Code","Code","Item Number"],"prodDesc"=>["Product Description","Description"],"aux"=>["Auxiliary Description...","Auxiliary Description","Auxiliary"],"brand"=>["Brand","Brand Name"],"price"=>["Price","Product Price","Item Price"],"uomDef"=>["Unit Of Measurement Definition...","Unit Of Measurement Definition"],"priceUom"=>["Price for Unit of Measurement...","Price for Unit of Measurement"],"mult"=>["Multiplier"],"div"=>["Divider"],"weight"=>["Weight","Product Weight","Item Weight"],"case"=>["Case"],"prodAvail"=>["Product Availability","Item Availability"],"manCode"=>["Manufacturer Code"],"manName"=>["Manufacturer Name"],"upc"=>["UPC"]));


Config::set('subscription_plan_type_options', array('monthly'=> 'plans.monthly','annual' => 'plans.annual','daily' => 'plans.daily'));
Config::set('subscription_price_type_option', array('monthly'=> 'plans.monthly_price','annual' => 'plans.annual_price','price' => 'plans.price'));

Config::set('days_options', array("monday"=>"Monday","tuesday"=>"Tuesday","wednesday"=>"Wednesday","thursday"=>"Thursday","friday"=>"Friday","saturday"=>"Saturday","sunday"=>"Sunday"));


Config::set('account_mapping_rules', array( "email"=>"Email"  ,  "firstName" => "First Name","lastName"=>"Last Name","aux"=>"Auxiliary Description..."));


define("PFG",3);
define("SYSCO",4);
define("US_FOODS",5);
define("UNITED_FISH",6);
define("ZANDER_PRODUCE",7);

define("SHOP_PAGE_LIMIT",10);

define("DEFAULT_COUNTRY_ID",231);

Config::set('pfg_ftp_details', array("server"=>"ecomm.pfgc.com","port"=>"21","user"=>"zzSMITHFIELD","password"=>"PFG$0604"));

define("US_CURRENCY_FORMAT",'X,XXX.XX');
define("SPAIN_CURRENCY_FORMAT", 'X.XXX,XX');

define('WIDGETS', array( 
                  '0'=>array('url'=>'reports.index'  , 'name'=>'Reports') ,
                  '1'=>array('url'=>'Location.index'  , 'name'=>'Location Management') ,
                  '2'=>array('url'=>'Team.index'  , 'name'=>'Teams') ,
                  '3'=>array('url'=>'Accounts.index'  , 'name'=>'Accounts') ,
                  '4'=>array('url'=>'Suppliers.index'  , 'name'=>'Suppliers') ,
                  '5'=>array('url'=>'ConfigureProducts.index'  , 'name'=>'Order Guide') ,
                  '6'=>array('url'=>'CompanySetting.edit'  , 'name'=>'Company Setting') ,
                  '7'=>array('url'=>'user.billing'  , 'name'=>'Billing') ));
                  
                 // 'Location Management'=> 'Location.index','Teams' => 'Team.index','Users' => 'Accounts.index'  , 'Suppliers'=>'Suppliers.index' , 'Order Guide'=>'ConfigureProducts.index'  , 'Company Setting'=>'CompanySetting.edit' , 'Billing' =>'user.billing'));

Config::set('currency_array', array("USD"=>"USD","EURO"=>"EURO","PESO"=>"PESO"));
Config::set('status_array', array(''=>'all',"0"=>"global.inactive","1"=>"global.active"));
