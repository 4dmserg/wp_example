<?php

$languages = apply_filters('wpml_active_languages', NULL, array('skip_missing' => 0, 'link_empty_to' => ''));


    $current_language = TRUE;
    $langSlug         = TRUE;
    
    $activeUK = TRUE;
    $activeEN = TRUE;
    $activeRU = TRUE;

    $current_language = apply_filters('wpml_current_language', null); 
    
    if($current_language == 'uk'){
        $langSlug = $languages['uk']['native_name'];
        $activeUK = 'active';
    }
    elseif($current_language == 'en'){
        $langSlug = $languages['en']['native_name'];
        $activeEN = 'active';
    }
    elseif($current_language == 'ru'){
        $langSlug = $languages['ru']['native_name'];
        $activeRU = 'active';
    }
    
?>
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                
              <?php
                $flags = '<div class="dropdown dropdown-flags">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  '.$langSlug.'
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <a href="'.$languages['uk']['url'].'" class="dropdown-item '.$activeUK.'" type="button">
                    <picture>
                       <img src="https://fotobanka.photo/wp-content/plugins/sitepress-multilingual-cms/res/flags/uk.png" alt="Ukraine">
                    </picture>
                    Українська
                   </a>
                  <a href="'.$languages['en']['url'].'" class="dropdown-item '.$activeEN.'" type="button">
                    <picture>
                       <img src="https://fotobanka.photo/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="English">
                    </picture>
                    English
                   </a>
                  <!--<a href="'.$languages['ru']['url'].'" class="dropdown-item '.$activeRU.'" type="button">
                    <picture>
                       <img src="https://fotobanka.photo/wp-content/plugins/sitepress-multilingual-cms/res/flags/ru.png" alt="Russian">
                    </picture>
                    Русский
                   </a>-->
                </div>
              </div>';
              ?>   
              <?php show_main_menu($flags) ?>

            </nav>
