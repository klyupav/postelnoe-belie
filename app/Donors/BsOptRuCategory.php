<?php

namespace App\Donors;

use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

Class BsOptRuCategory extends BsOptRu {

    public function getSources($opt = [])
    {
        $categories = [];
        $cats = [
//            -материнские платы
            'материнские платы Hewlett-Packard' => 'https://bs-opt.ru/materinskie-platy/Hewlett-Packard_mb/',
            'материнские платы IBM' => 'https://bs-opt.ru/materinskie-platy/ibm_mb/',
            'материнские платы Dell' => 'https://bs-opt.ru/materinskie-platy/dell_mb/',
            'материнские платы Sun' => 'https://bs-opt.ru/materinskie-platy/sun_mb/',
            'материнские платы NetApp' => 'https://bs-opt.ru/materinskie-platy/netapp_mb/',
//            -жесткие диски
            'жесткие диски Hewlett-Packard' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_hewlett-packard/',
            'жесткие диски IBM' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_ibm/',
            'жесткие диски Dell' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_dell/',
            'жесткие диски EMC Clariion' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_emc/',
            'жесткие диски Fujitsu' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_fujitsu/',
            'жесткие диски NetApp' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_netapp/',
            'жесткие диски Seagate' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_seagate/',
            'жесткие диски Sun' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_sun/',
            'жесткие диски Toshiba' => 'https://bs-opt.ru/hdd/hdd_toshiba/',
            'жесткие диски Intell' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_intel/',
            'жесткие диски Hitachi' => 'https://bs-opt.ru/hdd/servernye_zhestkie-diski_hitachi/',
//            -оперативная память
            'оперативная память Hewlett-Packard' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/Hewlett-Packard_ram/',
            'оперативная память IBM' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/ibm_ram/',
            'оперативная память Dell' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/dell_ram/',
            'оперативная память Samsung' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/samsung_ram/',
            'оперативная память Micron' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/micron_ram/',
            'оперативная память kingston' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/kingston_ram/',
            'оперативная память hynix' => 'https://bs-opt.ru/operativnaya-pamyat-dlya-serverov/ram_hynix/',
//            -блоки питания
            'блоки питания hp' => 'https://bs-opt.ru/servernye_bloki_pitaniya/Hewlett-Packard_bp/',
            'блоки питания ibm' => 'https://bs-opt.ru/servernye_bloki_pitaniya/ibm_bp/',
            'блоки питания dell' => 'https://bs-opt.ru/servernye_bloki_pitaniya/dell_bp/',
            'блоки питания emc' => 'https://bs-opt.ru/servernye_bloki_pitaniya/emc_bp/',
            'блоки питания sun' => 'https://bs-opt.ru/servernye_bloki_pitaniya/sun_bp/',
            'блоки питания toshiba' => 'https://bs-opt.ru/servernye_bloki_pitaniya/toshiba_bp/',
            'блоки питания delta' => 'https://bs-opt.ru/servernye_bloki_pitaniya/bloki_pitania_delta/',
//            -процессоры
            'процессоры' => 'https://bs-opt.ru/processors/',
//            -контроллеры (сюда же парсим сетевые карты)
            'контроллеры hp' => 'https://bs-opt.ru/controllers/servernye_kontrollery_hewlett-packard/',
            'контроллеры dell' => 'https://bs-opt.ru/controllers/servernye_kontrollery_dell/',
            'контроллеры emulex' => 'https://bs-opt.ru/controllers/servernye_kontrollery_emulex/',
            'контроллеры ibm' => 'https://bs-opt.ru/controllers/servernye_kontrollery_ibm/',
            'контроллеры intel' => 'https://bs-opt.ru/controllers/servernye_kontrollery_intel/',
            'контроллеры lsi' => 'https://bs-opt.ru/controllers/servernye_kontrollery_lsi/',
            'контроллеры netApp' => 'https://bs-opt.ru/controllers/servernye_kontrollery_netapp/',
            'контроллеры sun' => 'https://bs-opt.ru/controllers/servernye_kontrollery_sun/',
            'контроллеры Qlogic' => 'https://bs-opt.ru/controllers/servernye_kontrollery_qlogic/',
            'сетевые карты emulex' => 'https://bs-opt.ru/lancards/emulex_seteviekarti/',
            'сетевые карты hp' => 'https://bs-opt.ru/lancards/hp_seteviekarti/',
            'сетевые карты ibm' => 'https://bs-opt.ru/lancards/ibm_seteviekarti/',
            'сетевые карты intel' => 'https://bs-opt.ru/lancards/intel_seteviekarti/',
//            -серверные платформы
//            'hp' => '',
//            'ibm' => '',
//            'dell' => '',
//            'intel' => '',
//            'Supermicro' => '',
//            'emc' => '',
//            'NetApp' => '',
//            -системы охлаждения
            'системы охлаждения' => 'https://bs-opt.ru/coolers/',
//            -прочее
            'прочее' => 'https://bs-opt.ru/prochee/',
//            'рельсы' => '',
//            'салазки' => '',
//            'трансиверы' => '',
//            'корзины' => '',
//            'райзеры' => '',
//            'кабели' => '',
        ];
        foreach ($cats as $title => $cat)
        {
            $url = $cat;
            $parent = '';
            $hash = md5($parent.$url.$title);
            $categories[] = [
                'source' => $url,
                'hash' => $hash,
                'title' => $title,
                'parent' => $parent,
            ];
        }
//        print_r($categories);die();

        return $categories;
    }

//    public function getData($url, $source = [])
//    {
//        $data = false;
//
//        return $data;
//    }
}
