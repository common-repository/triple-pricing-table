<?php
/*
Plugin Name: Triple Pricing Table
Plugin URI: http://diseñowebmadrid.com/triple-pricing-table/
Description: Responsive and customizable Wordpress table for your site. An easy way to announce your services and prices.
Version: 2.0
Author: Webpsilon S.L.
Author URI: https://www.webpsilon.com/

Copyright 2018 Webpsilon S.L.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
*/


function tpt_style_pricing() {
    wp_enqueue_style( 'triple-pricing-style', plugin_dir_url( __FILE__ ).'css/style.css');

}
add_action('wp_enqueue_scripts', 'tpt_style_pricing', 1);


add_action('admin_enqueue_scripts', 'tpt_wp_enqueue_color_picker_pricing');
function tpt_wp_enqueue_color_picker_pricing(){
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


function tpt_pricingtable_animation( $atts ) {
    global $wpdb;
    global $font;
    $table_name = $wpdb->prefix . "pricingtableconfig";
    $re = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY idpricing DESC" ); // If user don't add an id, it's going to select the last one.

    extract( shortcode_atts( array(
        'id' => '',
    ), $atts, 'multilink' ) );  
    

    if ($id != '')
    $re = $wpdb->get_results( "SELECT * FROM $table_name WHERE idpricing=$id" ); // We select the register selected by the user

    $name = $re[0]->name;
    $about = $re[0]->about;
    $title1 = $re[0]->title1;
    $title2 = $re[0]->title2;
    $title3= $re[0]->title3;
    $descriptiona1= $re[0]->descriptiona1;
    $descriptiona2= $re[0]->descriptiona2;
    $descriptiona3= $re[0]->descriptiona3;
    $descriptiona4= $re[0]->descriptiona4;
    $descriptiona5= $re[0]->descriptiona5;
    $descriptiona6= $re[0]->descriptiona6;
    $descriptionb1= $re[0]->descriptionb1;
    $descriptionb2= $re[0]->descriptionb2;
    $descriptionb3= $re[0]->descriptionb3;
    $descriptionb4= $re[0]->descriptionb4;
    $descriptionb5= $re[0]->descriptionb5;
    $descriptionb6= $re[0]->descriptionb6;
    $descriptionc1= $re[0]->descriptionc1;
    $descriptionc2= $re[0]->descriptionc2;
    $descriptionc3= $re[0]->descriptionc3;
    $descriptionc4= $re[0]->descriptionc4;
    $descriptionc5= $re[0]->descriptionc5;
    $descriptionc6= $re[0]->descriptionc6;
    $price1= $re[0]->price1;
    $price2= $re[0]->price2;
    $price3= $re[0]->price3;
    $subprice1= $re[0]->subprice1;
    $subprice2= $re[0]->subprice2;
    $subprice3= $re[0]->subprice3;
    $gmessage1= $re[0]->gmessage1;
    $gmessage2= $re[0]->gmessage2;
    $gmessage3= $re[0]->gmessage3;
    $gurl1= $re[0]->gurl1;
    $gurl2= $re[0]->gurl2;
    $gurl3= $re[0]->gurl3;
    $font= $re[0]->font;
    $color1= $re[0]->color1;
    $color2= $re[0]->color2;
    $colorback1= $re[0]->colorback1;


    // Comment form styling
    $content='

        <ul class="pricing_table" style="font-family: '.$font.', arial, verdana; margin: 0px; background: transparent linear-gradient('.$colorback1.', #333) repeat scroll 0% 0%">
        <li style="list-style-type: none !important; background: none !important; padding: 0px; margin-bottom: 0px">
            <h3 style="color:white">'.$title1.'</h3>
            <div class="price_body">
                <div class="price">
                    '.$price1.'
                </div>
            </div>
            <div class="features">
                <ul class="centul">
                    <li>'.$descriptiona1.'</li>
                    <li>'.$descriptiona2.'</li>
                    <li>'.$descriptiona3.'</li>
                    <li>'.$descriptiona4.'</li>
                    <li>'.$descriptiona5.'</li>
                    <li>'.$descriptiona6.'</li>
                </ul>
            </div>
            <div class="footer">
                <a href="'.$gurl1.'" class="action_button">'.$gmessage1.'</a>
            </div>
        </li>
        <!-- Active/Hover styles -->
        <li class="active" style="background: transparent linear-gradient('.$color1.', '.$color2.') !important; list-style-type: none !important">
            <h3 style="color:white">'.$title2.'</h3>
            <div class="price_body">
                <div class="price">
                    <span class="price_figure">'.$price2.'</span>
                    <span class="price_term">'.$subprice2.'</span>
                </div>
            </div>
            <div class="features">
                <ul class="centul">
                    <li>'.$descriptionb1.'</li>
                    <li>'.$descriptionb2.'</li>
                    <li>'.$descriptionb3.'</li>
                    <li>'.$descriptionb4.'</li>
                    <li>'.$descriptionb5.'</li>
                    <li>'.$descriptionb6.'</li>
                </ul>
            </div>
            <div class="footer">
                <a href="'.$gurl2.'" class="action_button" style="background: transparent linear-gradient('.$color2.', '.$color1.') !important">'.$gmessage2.'</a>
            </div>
        </li>
        <li style="list-style-type: none !important; background: none !important; padding: 0px; margin: 0px">
            <h3 style="color:white">'.$title3.'</h3>
            <div class="price_body">
                <div class="price">
                    <span class="price_figure">'.$price3.'</span>
                    <span class="price_term">'.$subprice3.'</span>
                </div>
            </div>
            <div class="features">
                <ul class="centul">
                    <li>'.$descriptionc1.'</li>
                    <li>'.$descriptionc2.'</li>
                    <li>'.$descriptionc3.'</li>
                    <li>'.$descriptionc4.'</li>
                    <li>'.$descriptionc5.'</li>
                    <li>'.$descriptionc6.'</li>
                </ul>
            </div>
            <div class="footer">
                <a href="'.$gurl3.'" class="action_button">'.$gmessage3.'</a>
            </div>
        </li>
        <!-- To prevent .pricing_table height collapse(as its children are floated) -->
        <div class="clr"></div>
        </ul>

    <!-- Prefixfree to handle vendor prefixes -->
    <script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>

    ';
    return $content;
    
}add_shortcode( 'pricingtable', 'tpt_pricingtable_animation' );



// Admin menu creation
add_action('admin_menu', 'tpt_pricingtable_menu');
function tpt_pricingtable_menu() {
    add_options_page('Triple Pricing Table - Admin', 'Triple Pricing Table', 'manage_options', 'pricingtable', 'tpt_settings_pricingtable');
}



function tpt_pricing_db_function_files(){
    // Table creation
    global $wpdb;
    $table_name2 = $wpdb->prefix . "pricingtableconfig";
    $re_files = $wpdb->query("select * from $table_name2");
    
    // Files table
        if(empty($re_files)) {
            $sql = "CREATE TABLE $table_name2(
            idpricing mediumint( 9 ) NOT NULL AUTO_INCREMENT ,

            name longtext NOT NULL ,
            about longtext NOT NULL,
            title1 longtext NOT NULL ,
            title2 longtext NOT NULL ,
            title3 longtext NOT NULL ,
            descriptiona1 longtext NOT NULL ,
            descriptiona2 longtext NOT NULL ,
            descriptiona3 longtext NOT NULL ,
            descriptiona4 longtext NOT NULL ,
            descriptiona5 longtext NOT NULL ,
            descriptiona6 longtext NOT NULL ,
            descriptionb1 longtext NOT NULL ,
            descriptionb2 longtext NOT NULL ,
            descriptionb3 longtext NOT NULL ,
            descriptionb4 longtext NOT NULL ,
            descriptionb5 longtext NOT NULL ,
            descriptionb6 longtext NOT NULL ,
            descriptionc1 longtext NOT NULL ,
            descriptionc2 longtext NOT NULL ,
            descriptionc3 longtext NOT NULL ,
            descriptionc4 longtext NOT NULL ,
            descriptionc5 longtext NOT NULL ,
            descriptionc6 longtext NOT NULL ,
            price1 longtext NOT NULL ,
            price2 longtext NOT NULL ,
            price3 longtext NOT NULL ,
            subprice1 longtext NOT NULL ,
            subprice2 longtext NOT NULL ,
            subprice3 longtext NOT NULL ,
            gmessage1 longtext NOT NULL ,
            gmessage2 longtext NOT NULL ,
            gmessage3 longtext NOT NULL ,
            gurl1 longtext NOT NULL ,
            gurl2 longtext NOT NULL ,
            gurl3 longtext NOT NULL ,
            font longtext NOT NULL ,
            color1 longtext NOT NULL ,
            color2 longtext NOT NULL ,

            PRIMARY KEY (idpricing)

            );";
            
            
            $wpdb->query($sql);

        }

        $wpdb->get_results("SELECT COUNT(colorback1) FROM $table_name2");
        
        if ($wpdb->num_rows == 0){
            $sql2 = "ALTER TABLE $table_name2 ADD colorback1 longtext NOT NULL";
            $wpdb->query($sql2);
            $sql2 = "UPDATE $table_name2 SET colorback1='#666'";
            $wpdb->query($sql2);
        }
       

    $re_files = $wpdb->query("select * from $table_name2");
    return $re_files;
}





// Settings for the admin menu
function tpt_settings_pricingtable(){
    global $wpdb;
    $re_files=tpt_pricing_db_function_files(); // Files database
    $table_name2 = $wpdb->prefix . "pricingtableconfig";

    if (isset($_REQUEST["new"])){
        $sql = "INSERT INTO $table_name2 (name, about, title1, title2, title3, descriptiona1, descriptiona2, descriptiona3, descriptiona4, descriptiona5, descriptiona6, descriptionb1, descriptionb2, descriptionb3, descriptionb4, descriptionb5, descriptionb6, descriptionc1, descriptionc2, descriptionc3, descriptionc4, descriptionc5, descriptionc6, price1, price2, price3, subprice1, subprice2, subprice3, gmessage1, gmessage2, gmessage3, gurl1, gurl2, gurl3, font, color1, color2, colorback1) VALUES('Name', 'About', 'Title 1', 'Title 2', 'Title 3', 'Description A 1', 'Description A 2', 'Description A 3', 'Description A 4', 'Description A 5', 'Description A 6', 'Description B 1', 'Description B 2', 'Description B 3', 'Description B 4', 'Description B 5', 'Description B 6', 'Description C 1', 'Description C 2', 'Description C 3', 'Description C 4', 'Description C 5', 'Description C 6', 'FREE', '$9', '$19', ' ', 'PER MONTH', 'PER MONTH', 'Get offer', 'Get offer', 'Get offer', 'http://yoursite1', 'http://yoursite2', 'http://yoursite3', 'Ubuntu', '#F9B84A', '#DB7224', '#666');";
        $wpdb -> query($sql);
    }

    $content='
    <div class="wrap">
    ';
    _e( '<h1>Triple Pricing Table - Admin page</h1>', 'triple-pricing-table' );
    _e( 'Customize all your tables appearance.<br /><br />', 'triple-pricing-table' );
    _e( '<form method="post"><input type="submit" name="new" id="new" class="button button-primary" value="New Triple Pricing Table"  /></form>', 'triple-pricing-table' );    

    function tpt_sanitize($sanitized_var){ // San & val funct.
        return esc_attr(sanitize_text_field($_POST[$sanitized_var]));
    }

    if(isset($_POST['submit'])){
        // Validation
        $array = array( 'name', 'about', 'title1', 'title2', 'title3', 'descriptiona1', 'descriptiona2', 'descriptiona3', 'descriptiona4', 'descriptiona5', 'descriptiona6', 'descriptionb1', 'descriptionb2', 'descriptionb3', 'descriptionb4', 'descriptionb5', 'descriptionb6', 'descriptionc1', 'descriptionc2', 'descriptionc3', 'descriptionc4', 'descriptionc5', 'descriptionc6', 'price1', 'price2', 'price3', 'subprice1', 'subprice2', 'subprice3', 'gmessage1', 'gmessage2', 'gmessage3', 'gurl1', 'gurl2', 'gurl3', 'font', 'color1', 'color2', 'colorback1' );

        $sql = "UPDATE $table_name2 SET name='".tpt_sanitize("name")."', about='".tpt_sanitize("about")."', title1='".tpt_sanitize("title1")."', title2='".tpt_sanitize("title2")."', title3='".tpt_sanitize("title3")."', descriptiona1='".tpt_sanitize("descriptiona1")."', descriptiona2='".tpt_sanitize("descriptiona2")."', descriptiona3='".tpt_sanitize("descriptiona3")."', descriptiona4='".tpt_sanitize("descriptiona4")."', descriptiona5='".tpt_sanitize("descriptiona5")."', descriptiona6='".tpt_sanitize("descriptiona6")."', descriptionb1='".tpt_sanitize("descriptionb1")."', descriptionb2='".tpt_sanitize("descriptionb2")."', descriptionb3='".tpt_sanitize("descriptionb3")."', descriptionb4='".tpt_sanitize("descriptionb4")."', descriptionb5='".tpt_sanitize("descriptionb5")."', descriptionb6='".tpt_sanitize("descriptionb6")."', descriptionc1='".tpt_sanitize("descriptionc1")."', descriptionc2='".tpt_sanitize("descriptionc2")."', descriptionc3='".tpt_sanitize("descriptionc3")."', descriptionc4='".tpt_sanitize("descriptionc4")."', descriptionc5='".tpt_sanitize("descriptionc5")."', descriptionc6='".tpt_sanitize("descriptionc6")."', price1='".tpt_sanitize("price1")."', price2='".tpt_sanitize("price2")."', price3='".tpt_sanitize("price3")."', subprice1='".tpt_sanitize("subprice1")."', subprice2='".tpt_sanitize("subprice2")."', subprice3='".tpt_sanitize("subprice3")."', gmessage1='".tpt_sanitize("gmessage1")."', gmessage2='".tpt_sanitize("gmessage2")."', gmessage3='".tpt_sanitize("gmessage3")."', gurl1='".tpt_sanitize("gurl1")."', gurl2='".tpt_sanitize("gurl2")."', gurl3='".tpt_sanitize("gurl3")."', font='".tpt_sanitize("font")."', color1='".tpt_sanitize("color1")."', color2='".tpt_sanitize("color2")."', colorback1='".tpt_sanitize("colorback1")."' WHERE idpricing=".$_POST['idpricing']."";
        $re = $wpdb->query($sql);
    }

    if(isset($_POST['new'])){
        $re = $wpdb->get_results( "SELECT * FROM $table_name2 ORDER BY idpricing DESC" );
    }
    if(isset($_POST['edit'])){
        $re = $wpdb->get_results( "SELECT * FROM $table_name2 WHERE idpricing=".$_POST['idpricing']."");
    }
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM $table_name2 WHERE idpricing=".$_POST['idpricing']."";
        $re = $wpdb->query($sql);
    }
    
    if(isset($_POST['new']) || isset($_POST['edit'])){
    _e( '<h2>Titles</h2>', 'triple-pricing-table' );

    ?>


    <!-- Titles -->
    <form method="post">
        <input type="hidden" value="<?php echo $re[0]->idpricing; ?>" id="idpricing" name="idpricing">

        <label for="name">
            <?php _e( 'Name for your <strong>Triple Pricing Table</strong>:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="name" id="name" value="<?php echo $re[0]->name; ?>" />
        <br />
        <label for="about">
            <?php _e( 'Please, add a description to identify your table in the future.', 'triple-pricing-table' ); ?>
            <br />
        </label>
        <input type="text" name="about" id="about" value="<?php echo $re[0]->about; ?>" />
        <br />
        <br /><br />

    <?php echo "<h2>Titles and contents to show</h2>";?>

    <?php echo "<h3>Title 1</h3>";?>
        <label for="title1">
            <?php _e( 'What do you want in <strong>Title 1 (left)</strong>?<br />', 'triple-pricing-table' ); ?>    
        </label>
        <input type="text" name="title1" id="title1" value="<?php echo $re[0]->title1; ?>" />
        <br />
        
        <label for="descriptiona1">
            <?php _e( '<strong>DESCRIPTION 1</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona1" id="descriptiona1" value="<?php echo $re[0]->descriptiona1; ?>" />
        <br /><br />
        <label for="descriptiona2">
            <?php _e( '<strong>DESCRIPTION 2</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona2" id="descriptiona2" value="<?php echo $re[0]->descriptiona2; ?>" />
        <br /><br />
        <label for="descriptiona3">
            <?php _e( '<strong>DESCRIPTION 3</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona3" id="descriptiona3" value="<?php echo $re[0]->descriptiona3; ?>" />
        <br /><br />
        <label for="descriptiona4">
            <?php _e( '<strong>DESCRIPTION 4</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona4" id="descriptiona4" value="<?php echo $re[0]->descriptiona4; ?>" />
        <br /><br />
        <label for="descriptiona5">
            <?php _e( '<strong>DESCRIPTION 5</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona5" id="descriptiona5" value="<?php echo $re[0]->descriptiona5; ?>" />
        <br /><br />
        <label for="descriptiona6">
            <?php _e( '<strong>DESCRIPTION 6</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptiona6" id="descriptiona6" value="<?php echo $re[0]->descriptiona6; ?>" />
        <br /><br />


    <?php echo "<h3>Title 2</h3>";?>
        <label for="title2">
            <?php _e( 'What do you want in <strong>Title 2 (center)</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="title2" id="title2" value="<?php echo $re[0]->title2; ?>" />
        <br />
        
        <label for="descriptionb1">
            <?php _e( '<strong>DESCRIPTION 1</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb1" id="descriptionb1" value="<?php echo $re[0]->descriptionb1; ?>" />
        <br /><br />
        <label for="descriptionb2">
            <?php _e( '<strong>DESCRIPTION 2</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb2" id="descriptionb2" value="<?php echo $re[0]->descriptionb2; ?>" />
        <br /><br />
        <label for="descriptionb3">
            <?php _e( '<strong>DESCRIPTION 3</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb3" id="descriptionb3" value="<?php echo $re[0]->descriptionb3; ?>" />
        <br /><br />
        <label for="descriptionb4">
            <?php _e( '<strong>DESCRIPTION 4</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb4" id="descriptionb4" value="<?php echo $re[0]->descriptionb4; ?>" />
        <br /><br />
        <label for="descriptionb5">
            <?php _e( '<strong>DESCRIPTION 5</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb5" id="descriptionb5" value="<?php echo $re[0]->descriptionb5; ?>" />
        <br /><br />
        <label for="descriptionb6">
            <?php _e( '<strong>DESCRIPTION 6</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionb6" id="descriptionb6" value="<?php echo $re[0]->descriptionb6; ?>" />
        <br /><br />


    <?php echo "<h3>Title 3</h3>";?>
        <label for="title3">
            <?php _e( 'What do you want in <strong>Title 3 (right)</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="title3" id="title3" value="<?php echo $re[0]->title3; ?>" />
        <br />
        
        <label for="descriptionc1">
            <?php _e( '<strong>DESCRIPTION 1</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc1" id="descriptionc1" value="<?php echo $re[0]->descriptionc1; ?>" />
        <br /><br />
        <label for="descriptionb2">
            <?php _e( '<strong>DESCRIPTION 2</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc2" id="descriptionc2" value="<?php echo $re[0]->descriptionc2; ?>" />
        <br /><br />
        <label for="descriptionc3">
            <?php _e( '<strong>DESCRIPTION 3</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc3" id="descriptionc3" value="<?php echo $re[0]->descriptionc3; ?>" />
        <br /><br />
        <label for="descriptionc4">
            <?php _e( '<strong>DESCRIPTION 4</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc4" id="descriptionc4" value="<?php echo $re[0]->descriptionc4; ?>" />
        <br /><br />
        <label for="descriptionc5">
            <?php _e( '<strong>DESCRIPTION 5</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc5" id="descriptionc5" value="<?php echo $re[0]->descriptionc5; ?>" />
        <br /><br />
        <label for="descriptionc6">
            <?php _e( '<strong>DESCRIPTION 6</strong> text:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="descriptionc6" id="descriptionc6" value="<?php echo $re[0]->descriptionc6; ?>" />
        <br /><br />


    <?php echo "<h3>Prices</h3>";?>
        <label for="price1">
            <?php _e( 'Define <strong>title 1 price</strong>:<br />', 'triple-pricing-table' ); ?> 
        </label>
        <input type="text" name="price1" id="price1" value="<?php echo $re[0]->price1; ?>" />
        <label for="subprice1">
            <?php _e( '[Daily | Weekly | Monthly | Yearly or whatever you want]', 'triple-pricing-table' ); ?> 
        </label>
        <input type="text" name="subprice1" id="subprice1" value="<?php echo $re[0]->subprice1; ?>" />
        <br />

        <label for="price2">
            <?php _e( 'Define <strong>title 2 price</strong>:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="price2" id="price2" value="<?php echo $re[0]->price2; ?>" />
        <label for="subprice2">
            <?php _e( '[Daily | Weekly | Monthly | Yearly or whatever you want]', 'triple-pricing-table' ); ?> 
        </label>
        <input type="text" name="subprice2" id="subprice2" value="<?php echo $re[0]->subprice2; ?>" />
        <br />

        <label for="price3">
            <?php _e( 'Define <strong>title 3 price</strong>:<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="price3" id="price3" value="<?php echo $re[0]->price3; ?>" />
        <label for="subprice1">
            <?php _e( '[Daily | Weekly | Monthly | Yearly or whatever you want]', 'triple-pricing-table' ); ?> 
        </label>
        <input type="text" name="subprice3" id="subprice3" value="<?php echo $re[0]->subprice3; ?>" />
        <br />
        <br /><br />


    <?php echo "<h3>Call to action buttons</h3>";?>
        <label for="gmessage1">
            <?php _e( 'What do you want in the first <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="gmessage1" id="gmessage1" value="<?php echo $re[0]->gmessage1; ?>" />
        <br />
        <label for="gurl1">
            <?php _e( 'URL for the first <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="gurl1" id="gurl1" value="<?php echo $re[0]->gurl1; ?>" />
        <br /><br />

        <label for="gmessage2">
            <?php _e( 'What do you want in the second <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <br />
        <input type="text" name="gmessage2" id="gmessage2" value="<?php echo $re[0]->gmessage2; ?>" />
        <label for="gurl2">
            <?php _e( 'URL for the first <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="gurl2" id="gurl2" value="<?php echo $re[0]->gurl2; ?>" />
        <br /><br />

        <label for="gmessage3">
            <?php _e( 'What do you want in the third <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="gmessage3" id="gmessage3" value="<?php echo $re[0]->gmessage3; ?>" />
        <br />
        <label for="gurl3">
            <?php _e( 'URL for the first <strong>call-to-action button</strong>?<br />', 'triple-pricing-table' ); ?>
        </label>
        <input type="text" name="gurl3" id="gurl3" value="<?php echo $re[0]->gurl3; ?>" />
        <br /><br />



        <!-- Icons -->

        <?php
            $googlefonts = array ( 'ABeeZee' => 'ABeeZee', 'Abel' => 'Abel', 'Abhaya Libre' => 'Abhaya+Libre', 'Abril Fatface' => 'Abril+Fatface', 'Aclonica' => 'Aclonica', 'Acme' => 'Acme', 'Actor' => 'Actor', 'Adamina' => 'Adamina', 'Advent Pro' => 'Advent+Pro', 'Aguafina Script' => 'Aguafina+Script', 'Akronim' => 'Akronim', 'Aladin' => 'Aladin', 'Aldrich' => 'Aldrich', 'Alef' => 'Alef', 'Alegreya' => 'Alegreya', 'Alegreya SC' => 'Alegreya+SC', 'Alegreya Sans' => 'Alegreya+Sans', 'Alegreya Sans SC' => 'Alegreya+Sans+SC', 'Alex Brush' => 'Alex+Brush', 'Alfa Slab One' => 'Alfa+Slab+One', 'Alice' => 'Alice', 'Alike' => 'Alike', 'Alike Angular' => 'Alike+Angular', 'Allan' => 'Allan', 'Allerta' => 'Allerta', 'Allerta Stencil' => 'Allerta+Stencil', 'Allura' => 'Allura', 'Almendra' => 'Almendra', 'Almendra Display' => 'Almendra+Display', 'Almendra SC' => 'Almendra+SC', 'Amarante' => 'Amarante', 'Amaranth' => 'Amaranth', 'Amatic SC' => 'Amatic+SC', 'Amethysta' => 'Amethysta', 'Amiko' => 'Amiko', 'Amiri' => 'Amiri', 'Amita' => 'Amita', 'Anaheim' => 'Anaheim', 'Andada' => 'Andada', 'Andika' => 'Andika', 'Angkor' => 'Angkor', 'Annie Use Your Telescope' => 'Annie+Use+Your+Telescope', 'Anonymous Pro' => 'Anonymous+Pro', 'Antic' => 'Antic', 'Antic Didone' => 'Antic+Didone', 'Antic Slab' => 'Antic+Slab', 'Anton' => 'Anton', 'Arapey' => 'Arapey', 'Arbutus' => 'Arbutus', 'Arbutus Slab' => 'Arbutus+Slab', 'Architects Daughter' => 'Architects+Daughter', 'Archivo' => 'Archivo', 'Archivo Black' => 'Archivo+Black', 'Archivo Narrow' => 'Archivo+Narrow', 'Aref Ruqaa' => 'Aref+Ruqaa', 'Arima Madurai' => 'Arima+Madurai', 'Arimo' => 'Arimo', 'Arizonia' => 'Arizonia', 'Armata' => 'Armata', 'Arsenal' => 'Arsenal', 'Artifika' => 'Artifika', 'Arvo' => 'Arvo', 'Arya' => 'Arya', 'Asap' => 'Asap', 'Asap Condensed' => 'Asap+Condensed', 'Asar' => 'Asar', 'Asset' => 'Asset', 'Assistant' => 'Assistant', 'Astloch' => 'Astloch', 'Asul' => 'Asul', 'Athiti' => 'Athiti', 'Atma' => 'Atma', 'Atomic Age' => 'Atomic+Age', 'Aubrey' => 'Aubrey', 'Audiowide' => 'Audiowide', 'Autour One' => 'Autour+One', 'Average' => 'Average', 'Average Sans' => 'Average+Sans', 'Averia Gruesa Libre' => 'Averia+Gruesa+Libre', 'Averia Libre' => 'Averia+Libre', 'Averia Sans Libre' => 'Averia+Sans+Libre', 'Averia Serif Libre' => 'Averia+Serif+Libre', 'Bad Script' => 'Bad+Script', 'Bahiana' => 'Bahiana', 'Baloo' => 'Baloo', 'Baloo Bhai' => 'Baloo+Bhai', 'Baloo Bhaijaan' => 'Baloo+Bhaijaan', 'Baloo Bhaina' => 'Baloo+Bhaina', 'Baloo Chettan' => 'Baloo+Chettan', 'Baloo Da' => 'Baloo+Da', 'Baloo Paaji' => 'Baloo+Paaji', 'Baloo Tamma' => 'Baloo+Tamma', 'Baloo Tammudu' => 'Baloo+Tammudu', 'Baloo Thambi' => 'Baloo+Thambi', 'Balthazar' => 'Balthazar', 'Bangers' => 'Bangers', 'Barlow' => 'Barlow', 'Barlow Condensed' => 'Barlow+Condensed', 'Barlow Semi Condensed' => 'Barlow+Semi+Condensed', 'Barrio' => 'Barrio', 'Basic' => 'Basic', 'Battambang' => 'Battambang', 'Baumans' => 'Baumans', 'Bayon' => 'Bayon', 'Belgrano' => 'Belgrano', 'Bellefair' => 'Bellefair', 'Belleza' => 'Belleza', 'BenchNine' => 'BenchNine', 'Bentham' => 'Bentham', 'Berkshire Swash' => 'Berkshire+Swash', 'Bevan' => 'Bevan', 'Bigelow Rules' => 'Bigelow+Rules', 'Bigshot One' => 'Bigshot+One', 'Bilbo' => 'Bilbo', 'Bilbo Swash Caps' => 'Bilbo+Swash+Caps', 'BioRhyme' => 'BioRhyme', 'BioRhyme Expanded' => 'BioRhyme+Expanded', 'Biryani' => 'Biryani', 'Bitter' => 'Bitter', 'Black Ops One' => 'Black+Ops+One', 'Bokor' => 'Bokor', 'Bonbon' => 'Bonbon', 'Boogaloo' => 'Boogaloo', 'Bowlby One' => 'Bowlby+One', 'Bowlby One SC' => 'Bowlby+One+SC', 'Brawler' => 'Brawler', 'Bree Serif' => 'Bree+Serif', 'Bubblegum Sans' => 'Bubblegum+Sans', 'Bubbler One' => 'Bubbler+One', 'Buda' => 'Buda', 'Buenard' => 'Buenard', 'Bungee' => 'Bungee', 'Bungee Hairline' => 'Bungee+Hairline', 'Bungee Inline' => 'Bungee+Inline', 'Bungee Outline' => 'Bungee+Outline', 'Bungee Shade' => 'Bungee+Shade', 'Butcherman' => 'Butcherman', 'Butterfly Kids' => 'Butterfly+Kids', 'Cabin' => 'Cabin', 'Cabin Condensed' => 'Cabin+Condensed', 'Cabin Sketch' => 'Cabin+Sketch', 'Caesar Dressing' => 'Caesar+Dressing', 'Cagliostro' => 'Cagliostro', 'Cairo' => 'Cairo', 'Calligraffitti' => 'Calligraffitti', 'Cambay' => 'Cambay', 'Cambo' => 'Cambo', 'Candal' => 'Candal', 'Cantarell' => 'Cantarell', 'Cantata One' => 'Cantata+One', 'Cantora One' => 'Cantora+One', 'Capriola' => 'Capriola', 'Cardo' => 'Cardo', 'Carme' => 'Carme', 'Carrois Gothic' => 'Carrois+Gothic', 'Carrois Gothic SC' => 'Carrois+Gothic+SC', 'Carter One' => 'Carter+One', 'Catamaran' => 'Catamaran', 'Caudex' => 'Caudex', 'Caveat' => 'Caveat', 'Caveat Brush' => 'Caveat+Brush', 'Cedarville Cursive' => 'Cedarville+Cursive', 'Ceviche One' => 'Ceviche+One', 'Changa' => 'Changa', 'Changa One' => 'Changa+One', 'Chango' => 'Chango', 'Chathura' => 'Chathura', 'Chau Philomene One' => 'Chau+Philomene+One', 'Chela One' => 'Chela+One', 'Chelsea Market' => 'Chelsea+Market', 'Chenla' => 'Chenla', 'Cherry Cream Soda' => 'Cherry+Cream+Soda', 'Cherry Swash' => 'Cherry+Swash', 'Chewy' => 'Chewy', 'Chicle' => 'Chicle', 'Chivo' => 'Chivo', 'Chonburi' => 'Chonburi', 'Cinzel' => 'Cinzel', 'Cinzel Decorative' => 'Cinzel+Decorative', 'Clicker Script' => 'Clicker+Script', 'Coda' => 'Coda', 'Coda Caption' => 'Coda+Caption', 'Codystar' => 'Codystar', 'Coiny' => 'Coiny', 'Combo' => 'Combo', 'Comfortaa' => 'Comfortaa', 'Coming Soon' => 'Coming+Soon', 'Concert One' => 'Concert+One', 'Condiment' => 'Condiment', 'Content' => 'Content', 'Contrail One' => 'Contrail+One', 'Convergence' => 'Convergence', 'Cookie' => 'Cookie', 'Copse' => 'Copse', 'Corben' => 'Corben', 'Cormorant' => 'Cormorant', 'Cormorant Garamond' => 'Cormorant+Garamond', 'Cormorant Infant' => 'Cormorant+Infant', 'Cormorant SC' => 'Cormorant+SC', 'Cormorant Unicase' => 'Cormorant+Unicase', 'Cormorant Upright' => 'Cormorant+Upright', 'Courgette' => 'Courgette', 'Cousine' => 'Cousine', 'Coustard' => 'Coustard', 'Covered By Your Grace' => 'Covered+By+Your+Grace', 'Crafty Girls' => 'Crafty+Girls', 'Creepster' => 'Creepster', 'Crete Round' => 'Crete+Round', 'Crimson Text' => 'Crimson+Text', 'Croissant One' => 'Croissant+One', 'Crushed' => 'Crushed', 'Cuprum' => 'Cuprum', 'Cutive' => 'Cutive', 'Cutive Mono' => 'Cutive+Mono', 'Damion' => 'Damion', 'Dancing Script' => 'Dancing+Script', 'Dangrek' => 'Dangrek', 'David Libre' => 'David+Libre', 'Dawning of a New Day' => 'Dawning+of+a+New+Day', 'Days One' => 'Days+One', 'Dekko' => 'Dekko', 'Delius' => 'Delius', 'Delius Swash Caps' => 'Delius+Swash+Caps', 'Delius Unicase' => 'Delius+Unicase', 'Della Respira' => 'Della+Respira', 'Denk One' => 'Denk+One', 'Devonshire' => 'Devonshire', 'Dhurjati' => 'Dhurjati', 'Didact Gothic' => 'Didact+Gothic', 'Diplomata' => 'Diplomata', 'Diplomata SC' => 'Diplomata+SC', 'Domine' => 'Domine', 'Donegal One' => 'Donegal+One', 'Doppio One' => 'Doppio+One', 'Dorsa' => 'Dorsa', 'Dosis' => 'Dosis', 'Dr Sugiyama' => 'Dr+Sugiyama', 'Duru Sans' => 'Duru+Sans', 'Dynalight' => 'Dynalight', 'EB Garamond' => 'EB+Garamond', 'Eagle Lake' => 'Eagle+Lake', 'Eater' => 'Eater', 'Economica' => 'Economica', 'Eczar' => 'Eczar', 'El Messiri' => 'El+Messiri', 'Electrolize' => 'Electrolize', 'Elsie' => 'Elsie', 'Elsie Swash Caps' => 'Elsie+Swash+Caps', 'Emblema One' => 'Emblema+One', 'Emilys Candy' => 'Emilys+Candy', 'Encode Sans' => 'Encode+Sans', 'Encode Sans Condensed' => 'Encode+Sans+Condensed', 'Encode Sans Expanded' => 'Encode+Sans+Expanded', 'Encode Sans Semi Condensed' => 'Encode+Sans+Semi+Condensed', 'Encode Sans Semi Expanded' => 'Encode+Sans+Semi+Expanded', 'Engagement' => 'Engagement', 'Englebert' => 'Englebert', 'Enriqueta' => 'Enriqueta', 'Erica One' => 'Erica+One', 'Esteban' => 'Esteban', 'Euphoria Script' => 'Euphoria+Script', 'Ewert' => 'Ewert', 'Exo' => 'Exo', 'Exo 2' => 'Exo+2', 'Expletus Sans' => 'Expletus+Sans', 'Fanwood Text' => 'Fanwood+Text', 'Farsan' => 'Farsan', 'Fascinate' => 'Fascinate', 'Fascinate Inline' => 'Fascinate+Inline', 'Faster One' => 'Faster+One', 'Fasthand' => 'Fasthand', 'Fauna One' => 'Fauna+One', 'Faustina' => 'Faustina', 'Federant' => 'Federant', 'Federo' => 'Federo', 'Felipa' => 'Felipa', 'Fenix' => 'Fenix', 'Finger Paint' => 'Finger+Paint', 'Fira Mono' => 'Fira+Mono', 'Fira Sans' => 'Fira+Sans', 'Fira Sans Condensed' => 'Fira+Sans+Condensed', 'Fira Sans Extra Condensed' => 'Fira+Sans+Extra+Condensed', 'Fjalla One' => 'Fjalla+One', 'Fjord One' => 'Fjord+One', 'Flamenco' => 'Flamenco', 'Flavors' => 'Flavors', 'Fondamento' => 'Fondamento', 'Fontdiner Swanky' => 'Fontdiner+Swanky', 'Forum' => 'Forum', 'Francois One' => 'Francois+One', 'Frank Ruhl Libre' => 'Frank+Ruhl+Libre', 'Freckle Face' => 'Freckle+Face', 'Fredericka the Great' => 'Fredericka+the+Great', 'Fredoka One' => 'Fredoka+One', 'Freehand' => 'Freehand', 'Fresca' => 'Fresca', 'Frijole' => 'Frijole', 'Fruktur' => 'Fruktur', 'Fugaz One' => 'Fugaz+One', 'GFS Didot' => 'GFS+Didot', 'GFS Neohellenic' => 'GFS+Neohellenic', 'Gabriela' => 'Gabriela', 'Gafata' => 'Gafata', 'Galada' => 'Galada', 'Galdeano' => 'Galdeano', 'Galindo' => 'Galindo', 'Gentium Basic' => 'Gentium+Basic', 'Gentium Book Basic' => 'Gentium+Book+Basic', 'Geo' => 'Geo', 'Geostar' => 'Geostar', 'Geostar Fill' => 'Geostar+Fill', 'Germania One' => 'Germania+One', 'Gidugu' => 'Gidugu', 'Gilda Display' => 'Gilda+Display', 'Give You Glory' => 'Give+You+Glory', 'Glass Antiqua' => 'Glass+Antiqua', 'Glegoo' => 'Glegoo', 'Gloria Hallelujah' => 'Gloria+Hallelujah', 'Goblin One' => 'Goblin+One', 'Gochi Hand' => 'Gochi+Hand', 'Gorditas' => 'Gorditas', 'Goudy Bookletter 1911' => 'Goudy+Bookletter+1911', 'Graduate' => 'Graduate', 'Grand Hotel' => 'Grand+Hotel', 'Gravitas One' => 'Gravitas+One', 'Great Vibes' => 'Great+Vibes', 'Griffy' => 'Griffy', 'Gruppo' => 'Gruppo', 'Gudea' => 'Gudea', 'Gurajada' => 'Gurajada', 'Habibi' => 'Habibi', 'Halant' => 'Halant', 'Hammersmith One' => 'Hammersmith+One', 'Hanalei' => 'Hanalei', 'Hanalei Fill' => 'Hanalei+Fill', 'Handlee' => 'Handlee', 'Hanuman' => 'Hanuman', 'Happy Monkey' => 'Happy+Monkey', 'Harmattan' => 'Harmattan', 'Headland One' => 'Headland+One', 'Heebo' => 'Heebo', 'Henny Penny' => 'Henny+Penny', 'Herr Von Muellerhoff' => 'Herr+Von+Muellerhoff', 'Hind' => 'Hind', 'Hind Guntur' => 'Hind+Guntur', 'Hind Madurai' => 'Hind+Madurai', 'Hind Siliguri' => 'Hind+Siliguri', 'Hind Vadodara' => 'Hind+Vadodara', 'Holtwood One SC' => 'Holtwood+One+SC', 'Homemade Apple' => 'Homemade+Apple', 'Homenaje' => 'Homenaje', 'IM Fell DW Pica' => 'IM+Fell+DW+Pica', 'IM Fell DW Pica SC' => 'IM+Fell+DW+Pica+SC', 'IM Fell Double Pica' => 'IM+Fell+Double+Pica', 'IM Fell Double Pica SC' => 'IM+Fell+Double+Pica+SC', 'IM Fell English' => 'IM+Fell+English', 'IM Fell English SC' => 'IM+Fell+English+SC', 'IM Fell French Canon' => 'IM+Fell+French+Canon', 'IM Fell French Canon SC' => 'IM+Fell+French+Canon+SC', 'IM Fell Great Primer' => 'IM+Fell+Great+Primer', 'IM Fell Great Primer SC' => 'IM+Fell+Great+Primer+SC', 'Iceberg' => 'Iceberg', 'Iceland' => 'Iceland', 'Imprima' => 'Imprima', 'Inconsolata' => 'Inconsolata', 'Inder' => 'Inder', 'Indie Flower' => 'Indie+Flower', 'Inika' => 'Inika', 'Inknut Antiqua' => 'Inknut+Antiqua', 'Irish Grover' => 'Irish+Grover', 'Istok Web' => 'Istok+Web', 'Italiana' => 'Italiana', 'Italianno' => 'Italianno', 'Itim' => 'Itim', 'Jacques Francois' => 'Jacques+Francois', 'Jacques Francois Shadow' => 'Jacques+Francois+Shadow', 'Jaldi' => 'Jaldi', 'Jim Nightshade' => 'Jim+Nightshade', 'Jockey One' => 'Jockey+One', 'Jolly Lodger' => 'Jolly+Lodger', 'Jomhuria' => 'Jomhuria', 'Josefin Sans' => 'Josefin+Sans', 'Josefin Slab' => 'Josefin+Slab', 'Joti One' => 'Joti+One', 'Judson' => 'Judson', 'Julee' => 'Julee', 'Julius Sans One' => 'Julius+Sans+One', 'Junge' => 'Junge', 'Jura' => 'Jura', 'Just Another Hand' => 'Just+Another+Hand', 'Just Me Again Down Here' => 'Just+Me+Again+Down+Here', 'Kadwa' => 'Kadwa', 'Kalam' => 'Kalam', 'Kameron' => 'Kameron', 'Kanit' => 'Kanit', 'Kantumruy' => 'Kantumruy', 'Karla' => 'Karla', 'Karma' => 'Karma', 'Katibeh' => 'Katibeh', 'Kaushan Script' => 'Kaushan+Script', 'Kavivanar' => 'Kavivanar', 'Kavoon' => 'Kavoon', 'Kdam Thmor' => 'Kdam+Thmor', 'Keania One' => 'Keania+One', 'Kelly Slab' => 'Kelly+Slab', 'Kenia' => 'Kenia', 'Khand' => 'Khand', 'Khmer' => 'Khmer', 'Khula' => 'Khula', 'Kite One' => 'Kite+One', 'Knewave' => 'Knewave', 'Kotta One' => 'Kotta+One', 'Koulen' => 'Koulen', 'Kranky' => 'Kranky', 'Kreon' => 'Kreon', 'Kristi' => 'Kristi', 'Krona One' => 'Krona+One', 'Kumar One' => 'Kumar+One', 'Kumar One Outline' => 'Kumar+One+Outline', 'Kurale' => 'Kurale', 'La Belle Aurore' => 'La+Belle+Aurore', 'Laila' => 'Laila', 'Lakki Reddy' => 'Lakki+Reddy', 'Lalezar' => 'Lalezar', 'Lancelot' => 'Lancelot', 'Lateef' => 'Lateef', 'Lato' => 'Lato', 'League Script' => 'League+Script', 'Leckerli One' => 'Leckerli+One', 'Ledger' => 'Ledger', 'Lekton' => 'Lekton', 'Lemon' => 'Lemon', 'Lemonada' => 'Lemonada', 'Libre Barcode 128' => 'Libre+Barcode+128', 'Libre Barcode 128 Text' => 'Libre+Barcode+128+Text', 'Libre Barcode 39' => 'Libre+Barcode+39', 'Libre Barcode 39 Extended' => 'Libre+Barcode+39+Extended', 'Libre Barcode 39 Extended Text' => 'Libre+Barcode+39+Extended+Text', 'Libre Barcode 39 Text' => 'Libre+Barcode+39+Text', 'Libre Baskerville' => 'Libre+Baskerville', 'Libre Franklin' => 'Libre+Franklin', 'Life Savers' => 'Life+Savers', 'Lilita One' => 'Lilita+One', 'Lily Script One' => 'Lily+Script+One', 'Limelight' => 'Limelight', 'Linden Hill' => 'Linden+Hill', 'Lobster' => 'Lobster', 'Lobster Two' => 'Lobster+Two', 'Londrina Outline' => 'Londrina+Outline', 'Londrina Shadow' => 'Londrina+Shadow', 'Londrina Sketch' => 'Londrina+Sketch', 'Londrina Solid' => 'Londrina+Solid', 'Lora' => 'Lora', 'Love Ya Like A Sister' => 'Love+Ya+Like+A+Sister', 'Loved by the King' => 'Loved+by+the+King', 'Lovers Quarrel' => 'Lovers+Quarrel', 'Luckiest Guy' => 'Luckiest+Guy', 'Lusitana' => 'Lusitana', 'Lustria' => 'Lustria', 'Macondo' => 'Macondo', 'Macondo Swash Caps' => 'Macondo+Swash+Caps', 'Mada' => 'Mada', 'Magra' => 'Magra', 'Maiden Orange' => 'Maiden+Orange', 'Maitree' => 'Maitree', 'Mako' => 'Mako', 'Mallanna' => 'Mallanna', 'Mandali' => 'Mandali', 'Manuale' => 'Manuale', 'Marcellus' => 'Marcellus', 'Marcellus SC' => 'Marcellus+SC', 'Marck Script' => 'Marck+Script', 'Margarine' => 'Margarine', 'Marko One' => 'Marko+One', 'Marmelad' => 'Marmelad', 'Martel' => 'Martel', 'Martel Sans' => 'Martel+Sans', 'Marvel' => 'Marvel', 'Mate' => 'Mate', 'Mate SC' => 'Mate+SC', 'Maven Pro' => 'Maven+Pro', 'McLaren' => 'McLaren', 'Meddon' => 'Meddon', 'MedievalSharp' => 'MedievalSharp', 'Medula One' => 'Medula+One', 'Meera Inimai' => 'Meera+Inimai', 'Megrim' => 'Megrim', 'Meie Script' => 'Meie+Script', 'Merienda' => 'Merienda', 'Merienda One' => 'Merienda+One', 'Merriweather' => 'Merriweather', 'Merriweather Sans' => 'Merriweather+Sans', 'Metal' => 'Metal', 'Metal Mania' => 'Metal+Mania', 'Metamorphous' => 'Metamorphous', 'Metrophobic' => 'Metrophobic', 'Michroma' => 'Michroma', 'Milonga' => 'Milonga', 'Miltonian' => 'Miltonian', 'Miltonian Tattoo' => 'Miltonian+Tattoo', 'Miniver' => 'Miniver', 'Miriam Libre' => 'Miriam+Libre', 'Mirza' => 'Mirza', 'Miss Fajardose' => 'Miss+Fajardose', 'Mitr' => 'Mitr', 'Modak' => 'Modak', 'Modern Antiqua' => 'Modern+Antiqua', 'Mogra' => 'Mogra', 'Molengo' => 'Molengo', 'Molle' => 'Molle', 'Monda' => 'Monda', 'Monofett' => 'Monofett', 'Monoton' => 'Monoton', 'Monsieur La Doulaise' => 'Monsieur+La+Doulaise', 'Montaga' => 'Montaga', 'Montez' => 'Montez', 'Montserrat' => 'Montserrat', 'Montserrat Alternates' => 'Montserrat+Alternates', 'Montserrat Subrayada' => 'Montserrat+Subrayada', 'Moul' => 'Moul', 'Moulpali' => 'Moulpali', 'Mountains of Christmas' => 'Mountains+of+Christmas', 'Mouse Memoirs' => 'Mouse+Memoirs', 'Mr Bedfort' => 'Mr+Bedfort', 'Mr Dafoe' => 'Mr+Dafoe', 'Mr De Haviland' => 'Mr+De+Haviland', 'Mrs Saint Delafield' => 'Mrs+Saint+Delafield', 'Mrs Sheppards' => 'Mrs+Sheppards', 'Mukta' => 'Mukta', 'Mukta Mahee' => 'Mukta+Mahee', 'Mukta Malar' => 'Mukta+Malar', 'Mukta Vaani' => 'Mukta+Vaani', 'Muli' => 'Muli', 'Mystery Quest' => 'Mystery+Quest', 'NTR' => 'NTR', 'Neucha' => 'Neucha', 'Neuton' => 'Neuton', 'New Rocker' => 'New+Rocker', 'News Cycle' => 'News+Cycle', 'Niconne' => 'Niconne', 'Nixie One' => 'Nixie+One', 'Nobile' => 'Nobile', 'Nokora' => 'Nokora', 'Norican' => 'Norican', 'Nosifer' => 'Nosifer', 'Nothing You Could Do' => 'Nothing+You+Could+Do', 'Noticia Text' => 'Noticia+Text', 'Noto Sans' => 'Noto+Sans', 'Noto Serif' => 'Noto+Serif', 'Nova Cut' => 'Nova+Cut', 'Nova Flat' => 'Nova+Flat', 'Nova Mono' => 'Nova+Mono', 'Nova Oval' => 'Nova+Oval', 'Nova Round' => 'Nova+Round', 'Nova Script' => 'Nova+Script', 'Nova Slim' => 'Nova+Slim', 'Nova Square' => 'Nova+Square', 'Numans' => 'Numans', 'Nunito' => 'Nunito', 'Nunito Sans' => 'Nunito+Sans', 'Odor Mean Chey' => 'Odor+Mean+Chey', 'Offside' => 'Offside', 'Old Standard TT' => 'Old+Standard+TT', 'Oldenburg' => 'Oldenburg', 'Oleo Script' => 'Oleo+Script', 'Oleo Script Swash Caps' => 'Oleo+Script+Swash+Caps', 'Open Sans' => 'Open+Sans', 'Open Sans Condensed' => 'Open+Sans+Condensed', 'Oranienbaum' => 'Oranienbaum', 'Orbitron' => 'Orbitron', 'Oregano' => 'Oregano', 'Orienta' => 'Orienta', 'Original Surfer' => 'Original+Surfer', 'Oswald' => 'Oswald', 'Over the Rainbow' => 'Over+the+Rainbow', 'Overlock' => 'Overlock', 'Overlock SC' => 'Overlock+SC', 'Overpass' => 'Overpass', 'Overpass Mono' => 'Overpass+Mono', 'Ovo' => 'Ovo', 'Oxygen' => 'Oxygen', 'Oxygen Mono' => 'Oxygen+Mono', 'PT Mono' => 'PT+Mono', 'PT Sans' => 'PT+Sans', 'PT Sans Caption' => 'PT+Sans+Caption', 'PT Sans Narrow' => 'PT+Sans+Narrow', 'PT Serif' => 'PT+Serif', 'PT Serif Caption' => 'PT+Serif+Caption', 'Pacifico' => 'Pacifico', 'Padauk' => 'Padauk', 'Palanquin' => 'Palanquin', 'Palanquin Dark' => 'Palanquin+Dark', 'Pangolin' => 'Pangolin', 'Paprika' => 'Paprika', 'Parisienne' => 'Parisienne', 'Passero One' => 'Passero+One', 'Passion One' => 'Passion+One', 'Pathway Gothic One' => 'Pathway+Gothic+One', 'Patrick Hand' => 'Patrick+Hand', 'Patrick Hand SC' => 'Patrick+Hand+SC', 'Pattaya' => 'Pattaya', 'Patua One' => 'Patua+One', 'Pavanam' => 'Pavanam', 'Paytone One' => 'Paytone+One', 'Peddana' => 'Peddana', 'Peralta' => 'Peralta', 'Permanent Marker' => 'Permanent+Marker', 'Petit Formal Script' => 'Petit+Formal+Script', 'Petrona' => 'Petrona', 'Philosopher' => 'Philosopher', 'Piedra' => 'Piedra', 'Pinyon Script' => 'Pinyon+Script', 'Pirata One' => 'Pirata+One', 'Plaster' => 'Plaster', 'Play' => 'Play', 'Playball' => 'Playball', 'Playfair Display' => 'Playfair+Display', 'Playfair Display SC' => 'Playfair+Display+SC', 'Podkova' => 'Podkova', 'Poiret One' => 'Poiret+One', 'Poller One' => 'Poller+One', 'Poly' => 'Poly', 'Pompiere' => 'Pompiere', 'Pontano Sans' => 'Pontano+Sans', 'Poppins' => 'Poppins', 'Port Lligat Sans' => 'Port+Lligat+Sans', 'Port Lligat Slab' => 'Port+Lligat+Slab', 'Pragati Narrow' => 'Pragati+Narrow', 'Prata' => 'Prata', 'Preahvihear' => 'Preahvihear', 'Press Start 2P' => 'Press+Start+2P', 'Pridi' => 'Pridi', 'Princess Sofia' => 'Princess+Sofia', 'Prociono' => 'Prociono', 'Prompt' => 'Prompt', 'Prosto One' => 'Prosto+One', 'Proza Libre' => 'Proza+Libre', 'Puritan' => 'Puritan', 'Purple Purse' => 'Purple+Purse', 'Quando' => 'Quando', 'Quantico' => 'Quantico', 'Quattrocento' => 'Quattrocento', 'Quattrocento Sans' => 'Quattrocento+Sans', 'Questrial' => 'Questrial', 'Quicksand' => 'Quicksand', 'Quintessential' => 'Quintessential', 'Qwigley' => 'Qwigley', 'Racing Sans One' => 'Racing+Sans+One', 'Radley' => 'Radley', 'Rajdhani' => 'Rajdhani', 'Rakkas' => 'Rakkas', 'Raleway' => 'Raleway', 'Raleway Dots' => 'Raleway+Dots', 'Ramabhadra' => 'Ramabhadra', 'Ramaraja' => 'Ramaraja', 'Rambla' => 'Rambla', 'Rammetto One' => 'Rammetto+One', 'Ranchers' => 'Ranchers', 'Rancho' => 'Rancho', 'Ranga' => 'Ranga', 'Rasa' => 'Rasa', 'Rationale' => 'Rationale', 'Ravi Prakash' => 'Ravi+Prakash', 'Redressed' => 'Redressed', 'Reem Kufi' => 'Reem+Kufi', 'Reenie Beanie' => 'Reenie+Beanie', 'Revalia' => 'Revalia', 'Rhodium Libre' => 'Rhodium+Libre', 'Ribeye' => 'Ribeye', 'Ribeye Marrow' => 'Ribeye+Marrow', 'Righteous' => 'Righteous', 'Risque' => 'Risque', 'Roboto' => 'Roboto', 'Roboto Condensed' => 'Roboto+Condensed', 'Roboto Mono' => 'Roboto+Mono', 'Roboto Slab' => 'Roboto+Slab', 'Rochester' => 'Rochester', 'Rock Salt' => 'Rock+Salt', 'Rokkitt' => 'Rokkitt', 'Romanesco' => 'Romanesco', 'Ropa Sans' => 'Ropa+Sans', 'Rosario' => 'Rosario', 'Rosarivo' => 'Rosarivo', 'Rouge Script' => 'Rouge+Script', 'Rozha One' => 'Rozha+One', 'Rubik' => 'Rubik', 'Rubik Mono One' => 'Rubik+Mono+One', 'Ruda' => 'Ruda', 'Rufina' => 'Rufina', 'Ruge Boogie' => 'Ruge+Boogie', 'Ruluko' => 'Ruluko', 'Rum Raisin' => 'Rum+Raisin', 'Ruslan Display' => 'Ruslan+Display', 'Russo One' => 'Russo+One', 'Ruthie' => 'Ruthie', 'Rye' => 'Rye', 'Sacramento' => 'Sacramento', 'Sahitya' => 'Sahitya', 'Sail' => 'Sail', 'Saira' => 'Saira', 'Saira Condensed' => 'Saira+Condensed', 'Saira Extra Condensed' => 'Saira+Extra+Condensed', 'Saira Semi Condensed' => 'Saira+Semi+Condensed', 'Salsa' => 'Salsa', 'Sanchez' => 'Sanchez', 'Sancreek' => 'Sancreek', 'Sansita' => 'Sansita', 'Sarala' => 'Sarala', 'Sarina' => 'Sarina', 'Sarpanch' => 'Sarpanch', 'Satisfy' => 'Satisfy', 'Scada' => 'Scada', 'Scheherazade' => 'Scheherazade', 'Schoolbell' => 'Schoolbell', 'Scope One' => 'Scope+One', 'Seaweed Script' => 'Seaweed+Script', 'Secular One' => 'Secular+One', 'Sedgwick Ave' => 'Sedgwick+Ave', 'Sedgwick Ave Display' => 'Sedgwick+Ave+Display', 'Sevillana' => 'Sevillana', 'Seymour One' => 'Seymour+One', 'Shadows Into Light' => 'Shadows+Into+Light', 'Shadows Into Light Two' => 'Shadows+Into+Light+Two', 'Shanti' => 'Shanti', 'Share' => 'Share', 'Share Tech' => 'Share+Tech', 'Share Tech Mono' => 'Share+Tech+Mono', 'Shojumaru' => 'Shojumaru', 'Short Stack' => 'Short+Stack', 'Shrikhand' => 'Shrikhand', 'Siemreap' => 'Siemreap', 'Sigmar One' => 'Sigmar+One', 'Signika' => 'Signika', 'Signika Negative' => 'Signika+Negative', 'Simonetta' => 'Simonetta', 'Sintony' => 'Sintony', 'Sirin Stencil' => 'Sirin+Stencil', 'Six Caps' => 'Six+Caps', 'Skranji' => 'Skranji', 'Slabo 13px' => 'Slabo+13px', 'Slabo 27px' => 'Slabo+27px', 'Slackey' => 'Slackey', 'Smokum' => 'Smokum', 'Smythe' => 'Smythe', 'Sniglet' => 'Sniglet', 'Snippet' => 'Snippet', 'Snowburst One' => 'Snowburst+One', 'Sofadi One' => 'Sofadi+One', 'Sofia' => 'Sofia', 'Sonsie One' => 'Sonsie+One', 'Sorts Mill Goudy' => 'Sorts+Mill+Goudy', 'Source Code Pro' => 'Source+Code+Pro', 'Source Sans Pro' => 'Source+Sans+Pro', 'Source Serif Pro' => 'Source+Serif+Pro', 'Space Mono' => 'Space+Mono', 'Special Elite' => 'Special+Elite', 'Spectral' => 'Spectral', 'Spectral SC' => 'Spectral+SC', 'Spicy Rice' => 'Spicy+Rice', 'Spinnaker' => 'Spinnaker', 'Spirax' => 'Spirax', 'Squada One' => 'Squada+One', 'Sree Krushnadevaraya' => 'Sree+Krushnadevaraya', 'Sriracha' => 'Sriracha', 'Stalemate' => 'Stalemate', 'Stalinist One' => 'Stalinist+One', 'Stardos Stencil' => 'Stardos+Stencil', 'Stint Ultra Condensed' => 'Stint+Ultra+Condensed', 'Stint Ultra Expanded' => 'Stint+Ultra+Expanded', 'Stoke' => 'Stoke', 'Strait' => 'Strait', 'Sue Ellen Francisco' => 'Sue+Ellen+Francisco', 'Suez One' => 'Suez+One', 'Sumana' => 'Sumana', 'Sunshiney' => 'Sunshiney', 'Supermercado One' => 'Supermercado+One', 'Sura' => 'Sura', 'Suranna' => 'Suranna', 'Suravaram' => 'Suravaram', 'Suwannaphum' => 'Suwannaphum', 'Swanky and Moo Moo' => 'Swanky+and+Moo+Moo', 'Syncopate' => 'Syncopate', 'Tangerine' => 'Tangerine', 'Taprom' => 'Taprom', 'Tauri' => 'Tauri', 'Taviraj' => 'Taviraj', 'Teko' => 'Teko', 'Telex' => 'Telex', 'Tenali Ramakrishna' => 'Tenali+Ramakrishna', 'Tenor Sans' => 'Tenor+Sans', 'Text Me One' => 'Text+Me+One', 'The Girl Next Door' => 'The+Girl+Next+Door', 'Tienne' => 'Tienne', 'Tillana' => 'Tillana', 'Timmana' => 'Timmana', 'Tinos' => 'Tinos', 'Titan One' => 'Titan+One', 'Titillium Web' => 'Titillium+Web', 'Trade Winds' => 'Trade+Winds', 'Trirong' => 'Trirong', 'Trocchi' => 'Trocchi', 'Trochut' => 'Trochut', 'Trykker' => 'Trykker', 'Tulpen One' => 'Tulpen+One', 'Ubuntu' => 'Ubuntu', 'Ubuntu Condensed' => 'Ubuntu+Condensed', 'Ubuntu Mono' => 'Ubuntu+Mono', 'Ultra' => 'Ultra', 'Uncial Antiqua' => 'Uncial+Antiqua', 'Underdog' => 'Underdog', 'Unica One' => 'Unica+One', 'UnifrakturCook' => 'UnifrakturCook', 'UnifrakturMaguntia' => 'UnifrakturMaguntia', 'Unkempt' => 'Unkempt', 'Unlock' => 'Unlock', 'Unna' => 'Unna', 'VT323' => 'VT323', 'Vampiro One' => 'Vampiro+One', 'Varela' => 'Varela', 'Varela Round' => 'Varela+Round', 'Vast Shadow' => 'Vast+Shadow', 'Vesper Libre' => 'Vesper+Libre', 'Vibur' => 'Vibur', 'Vidaloka' => 'Vidaloka', 'Viga' => 'Viga', 'Voces' => 'Voces', 'Volkhov' => 'Volkhov', 'Vollkorn' => 'Vollkorn', 'Vollkorn SC' => 'Vollkorn+SC', 'Voltaire' => 'Voltaire', 'Waiting for the Sunrise' => 'Waiting+for+the+Sunrise', 'Wallpoet' => 'Wallpoet', 'Walter Turncoat' => 'Walter+Turncoat', 'Warnes' => 'Warnes', 'Wellfleet' => 'Wellfleet', 'Wendy One' => 'Wendy+One', 'Wire One' => 'Wire+One', 'Work Sans' => 'Work+Sans', 'Yanone Kaffeesatz' => 'Yanone+Kaffeesatz', 'Yantramanav' => 'Yantramanav', 'Yatra One' => 'Yatra+One', 'Yellowtail' => 'Yellowtail', 'Yeseva One' => 'Yeseva+One', 'Yesteryear' => 'Yesteryear', 'Yrsa' => 'Yrsa', 'Zeyada' => 'Zeyada', 'Zilla Slab' => 'Zilla+Slab', 'Zilla Slab Highlight' => 'Zilla+Slab+Highlight', );
        ?>

            <thread>
                <tr>
                    <th><?php _e( '<h3>Font and color gradients</h3>', 'triple-pricing-table' ); ?></th>
                </tr>
            </thread>

            <tbody>
                <tr>
                    <td>
                        <?php _e( '<h4>Pick your desired font for titles and descriptions</h4>', 'triple-pricing-table' ); ?>
                        <select id="font" name="font">
                        <?php
                        $actual=$re[0]->font;
                        foreach($googlefonts as $k=>$v) {
                            if($k==$actual) echo '<option value="'.$k.'" selected>'.$k.'</option>';
                            else echo '<option value="'.$k.'">'.$k.'</option>';
                        }
                        ?>
                        </select>
                    </td>
                    <td>
                        <?php _e( '<h4>Color 1</h4>', 'triple-pricing-table' ); ?>
                        <input type="text" id="color1" name="color1" value="<?php echo $re[0]->color1; ?>" class="wp-color-picker-field" data-default-color="<?php echo $re[0]->color1; ?>" />
                    <script>jQuery(document).ready(function($){
                        $('.wp-color-picker-field').wpColorPicker();
                    });</script>
                    </td>

                    <td>
                        <?php _e( '<h4>Color 2</h4>', 'triple-pricing-table' ); ?>
                        <input type="text" id="color2" name="color2" value="<?php echo $re[0]->color2; ?>" class="wp-color-picker-field" data-default-color="<?php echo $re[0]->color2; ?>" />
                    <script>jQuery(document).ready(function($){
                        $('.wp-color-picker-field').wpColorPicker();
                    });</script>
                    </td>

                    <td>
                        <?php _e( '<h4>Back color</h4>', 'triple-pricing-table' ); ?>
                        <input type="text" id="colorback1" name="colorback1" value="<?php echo $re[0]->colorback1; ?>" class="wp-color-picker-field" data-default-color="<?php echo $re[0]->colorback1; ?>" />
                    <script>jQuery(document).ready(function($){
                        $('.wp-color-picker-field').wpColorPicker();
                    });</script>
                    </td>
                </tr>
            </tbody>

        <br /><br />

        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  />
        <br /><br /><hr>
    </form>

    <?php 
    }
        $re_files = $wpdb->get_results( "SELECT * FROM $table_name2 ORDER BY idpricing DESC" );

    _e( '<br /><h2>History</h2><h4>Check your created tables. (new to old):</h4>', 'triple-pricing-table' );
        $count_reg=count($re_files);
        if ($count_reg == 0){
            _e( "You don't have any Triple Pricing Table created, yet. You can create a new one whenever you want.", 'triple-pricing-table' );
        }
        $c=0;

        while($c<$count_reg){

    ?>
    
    <table class="widefat" style="width:auto, height:auto">
        <thead>
        <tr>
            <th><strong><?php _e( 'ID', 'triple-pricing-table' );?></strong></th>
            <th><strong><?php _e( 'NAME', 'triple-pricing-table' );?></strong></th>
            <th><strong><?php _e( 'ABOUT', 'triple-pricing-table' );?></strong></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $re_files[$c]->idpricing; ?></td>
            <td><?php echo $re_files[$c]->name; ?></td> 
            <td><?php echo $re_files[$c]->about; ?></td>
        </tr>
        </tbody>
    </table>

    <p><?php _e( 'Copy and paste where you want to show the table: [pricingtable id=', 'triple-pricing-table' );echo $re_files[$c]->idpricing; ?>]</p>
    <form method="post">
        <input type="hidden" value="<?php echo $re_files[$c]->idpricing; ?>" id="idpricing" name="idpricing" />
        <input type="submit" name="edit" id="edit" class="button button-seconday" style="background-color: #449D44; border-color: #255625; color: white;" value="<?php _e( 'Click to edit table ', 'triple-pricing-table' );echo $re_files[$c]->idpricing; ?> details"  />
        <input type="submit" name="delete" id="delete" class="button button-seconday" style="background-color: #D9534F; border-color: #D43F3A; color: white;" value="<?php _e( 'Click to delete table ', 'triple-pricing-table' );echo $re_files[$c]->idpricing; ?> details"  />
    </form>

    <br /><hr><br />

<?php
    $c++;
    } // While
}
?>