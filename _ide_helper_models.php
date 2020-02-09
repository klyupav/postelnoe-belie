<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @property bool $activated
 * @method static \Illuminate\Database\Query\Builder|\App\User whereActivated($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Source
 *
 * @property string $hash
 * @property string $source
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereSource($value)
 * @mixin \Eloquent
 * @property int $id
 * @property string $donor_class_name
 * @property string $name
 * @property string $image
 * @property string $desc
 * @property bool $parseit
 * @property bool $available
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereAvailable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereDonorClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereParseit($value)
 * @property int $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereVersion($value)
 */
	class Source extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RaoRfPub
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $CERT_NUM Номер аттестата аккредитации
 * @property string $REG_DATE Дата внесения в реестр сведений об аккредитованном лице
 * @property string $END_DATE Срок действия
 * @property string $STATUS_DATE Дата приостановления действия
 * @property string $NUM_DECISION Номер решения об аккредитации
 * @property string $DATE_DECISION Дата решения об аккредитации
 * @property string $TYPE_DECLARANT Тип заявителя
 * @property string $FULL_NAME Полное наименование юридического лица
 * @property string $FIO ФИО руководителя юридического лица
 * @property string $ADDRESS Адреса места нахождения юридического лица
 * @property string $PHONE Номер телефона
 * @property string $FAX Номер факса
 * @property string $EMAIL Адрес электронной почты
 * @property string $GOS_REG_YR Государственный регистрационный номер записи о регистрации юридического лица
 * @property string $INN Идентификационный номер налогоплательщика
 * @property string $FIO_RUC_ACC_LICA ФИО руководителя аккредитованного лица
 * @property string $ADRESS_ACC_AREA Адрес мест осуществления деятельности в области аккредитации
 * @property string $ACC_AREA Область аккредитации
 * @property string $TR Технический регламент ТС
 * @property string $OKPD Коды ОКПД
 * @property string $OKP Коды ОКП
 * @property string $OKUN Коды ОКУН
 * @property string $TN_VAD Коды ТН ВЭД
 * @property string $SKAN Скан-копия области аккредитации
 * @property string $NC_TN_VAD_EAS Национальная часть-Коды ТН ВЭД ЕАЭС
 * @property string $NC_TR_EAS Национальная часть-Технический регламент ЕАЭС
 * @property string $NC_ACC_AREA Национальная часть-Область аккредитации
 * @property string $NUM_DECISION_INCR_ACC_AREA Номер решения о расширении области аккредитации
 * @property string $DATE_DECISION_INCR_ACC_AREA Дата решения о расширении области аккредитации
 * @property string $TR_INCR_ACC_AREA Технический регламент ТС расширяемой области аккредитации
 * @property string $TN_VAD_INCR_ACC_AREA Коды ТН ВЭД расширяемой области аккредитации
 * @property string $DESC_ACC_AREA Описание области аккредитации
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereADDRESS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereADRESSACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereCERTNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereDATEDECISION($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereDATEDECISIONINCRACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereDESCACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereEMAIL($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereENDDATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereFAX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereFIO($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereFIORUCACCLICA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereFULLNAME($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereGOSREGYR($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereINN($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereNCACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereNCTNVADEAS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereNCTREAS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereNUMDECISION($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereNUMDECISIONINCRACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereOKP($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereOKPD($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereOKUN($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub wherePHONE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereREGDATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereSKAN($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereSTATUSDATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereTNVAD($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereTNVADINCRACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereTR($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereTRINCRACCAREA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereTYPEDECLARANT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RaoRfPub whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class RaoRfPub extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ticket
 *
 * @property int $id
 * @property int $kassirclub_event_id
 * @property int $kassirclub_location_id
 * @property int $kassirclub_sector_id
 * @property string $source
 * @property string $event_hash
 * @property string $date_event
 * @property string $location
 * @property string $sector
 * @property string $line
 * @property string $place
 * @property int $price
 * @property bool $available
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereAvailable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereDateEvent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereKassirclubEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereKassirclubLocationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereKassirclubSectorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereLine($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket wherePlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereSector($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereSource($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket whereEventHash($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RssRfPub
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $CERT_NUM Номер сертификата
 * @property string $CERF_RF Выбор раздела
 * @property string $ORG_TYPE Тип заявителя
 * @property string $MANUFACTURER_TYPE Тип изготовителя
 * @property string $O_APPLICANT_TYPE Вид заявителя
 * @property string $DECLARANT Заявитель
 * @property string $O_DIRECTOR_NAME ФИО руководителя (заявитель)
 * @property string $O_ADDRESS Адрес места нахождения (заявитель)
 * @property string $O_PHONE Номер телефона (заявитель)
 * @property string $O_FAX Номер факса (заявитель)
 * @property string $O_EMAIL Адрес электронной почты (заявитель)
 * @property string $O_OGRN Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН) (заявитель)
 * @property string $MANUFACTURER Изготовитель
 * @property string $M_ADDRESS Адрес места нахождения (изготовитель)
 * @property string $M_PHONE Номер телефона (изготовитель)
 * @property string $M_FAX Номер факса (изготовитель)
 * @property string $M_EMAIL Адрес электронной почты (изготовитель)
 * @property string $M_OGRN Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН) (изготовитель)
 * @property string $DOCUMENT_INFO Представленные документы
 * @property string $BASIC_FOR_CERTIFICATE Основание выдачи сертификата
 * @property string $REG_NUMBER Регистрационный номер аттестата аккредитации
 * @property string $TESTING_LAB_0_NAME Наименование испытательной лаборатории (центра)
 * @property string $DATE_REG Дата регистрации аттестата
 * @property string $OTHER_DOCUMENT_INFO Прочие документы, послужившие основанием выдачи сертификата
 * @property string $OBJECT_TYPE_CERT «Тип объекта сертификации»: серийный выпуск, партия, единичное изделие
 * @property string $PRODUCT_TYPE Вид продукции
 * @property string $PRODUCTION Полное наименование продукции
 * @property string $PRODUCTION_INFO Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $OKPD2 Коды ОКПД 2
 * @property string $TN_VED Код ТН ВЭД ЕАЭС
 * @property string $PRODUCT_INFO_EXT Иная информация, идентифицирующая продукцию
 * @property string $REGLAMENT Технический регламент
 * @property string $PROD_DOC_ISSUED Дополнительные сведения о технических регламентах
 * @property string $NOTATION_NATIONAL_STANDART Обозначение национального стандарта или свода правил
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property bool $cgroup-apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rss-table_standart-designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rss-table_standart-name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rss-table_standart-confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_reg_number Реквизиты сертификата. Регистрационный номер
 * @property string $a_blank_number Реквизиты сертификата. Номер бланка
 * @property string $ISSUE_DATE Дата начала действия
 * @property string $END_DATE Дата окончания действия
 * @property bool $cis_date_finish Реквизиты сертификата. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereBASICFORCERTIFICATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereCERFRF($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereCERTNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereCgroupAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereCisDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereDATEREG($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereDECLARANT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereDOCUMENTINFO($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereENDDATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereISSUEDATE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMADDRESS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMANUFACTURER($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMANUFACTURERTYPE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMEMAIL($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMFAX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMOGRN($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereMPHONE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereNOTATIONNATIONALSTANDART($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOADDRESS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOAPPLICANTTYPE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOBJECTTYPECERT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereODIRECTORNAME($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOEMAIL($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOFAX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOKPD2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOOGRN($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOPHONE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereORGTYPE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOTHERDOCUMENTINFO($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub wherePRODDOCISSUED($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub wherePRODUCTINFOEXT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub wherePRODUCTION($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub wherePRODUCTIONINFO($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub wherePRODUCTTYPE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereREGLAMENT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereREGNUMBER($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereRssTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereRssTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereRssTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereTESTINGLAB0NAME($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereTNVED($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssRfPub whereUpdatedAt($value)
 */
	class RssRfPub extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Datum
 *
 * @property int $id
 * @property string $donor_class_name
 * @property string $name
 * @property string $image
 * @property string $desc
 * @property string $hash
 * @property string $source
 * @property string $category
 * @property bool $parseit
 * @property bool $available
 * @property int $version
 * @property string $serialize
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereAvailable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereDonorClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereParseit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereSerialize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Datum whereVersion($value)
 * @mixin \Eloquent
 */
	class Datum extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Carbon\Carbon $created_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Migration
 *
 * @property int $id
 * @property string $migration
 * @property int $batch
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereBatch($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereMigration($value)
 * @mixin \Eloquent
 */
	class Migration extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ProxyList
 *
 * @property int $id
 * @property string $proxy
 * @property int $used
 * @property int $fails
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Donor whereProxy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Donor whereUsed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Donor whereFails($value)
 * @mixin \Eloquent
 * @property int $useragent_id
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProxyList whereUseragentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProxyList whereId($value)
 */
	class ProxyList extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property bool $activated
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereActivated($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RssTsPub
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $CERT_NUM Номер сертификата
 * @property string $a_cert_type-cert_ts Выбор раздела. Раздел реестра
 * @property string $a_cert_ts_type-ts Выбор раздела. Подраздел реестра
 * @property string $a_applicant_org_type-ul Сведения о заявителе, изготовителе, продукции. Тип заявителя
 * @property string $a_manufacturer_type-iul Сведения о заявителе, изготовителе, продукции. Тип изготовителя
 * @property string $a_applicant_info-rss-app_legal_person-applicant_type Сведения о юридическом лице (заявитель). Вид заявителя
 * @property string $a_applicant_info-rss-app_legal_person-name Сведения о юридическом лице (заявитель). Полное наименование
 * @property string $a_applicant_info-rss-app_legal_person-director_name Сведения о юридическом лице (заявитель). ФИО руководителя
 * @property string $a_applicant_info-rss-app_legal_person-address Сведения о юридическом лице (заявитель). Адрес места нахождения
 * @property string $a_applicant_info-rss-app_legal_person-phone Сведения о юридическом лице (заявитель). Номер телефона
 * @property string $a_applicant_info-rss-app_legal_person-fax Сведения о юридическом лице (заявитель). Номер факса
 * @property string $a_applicant_info-rss-app_legal_person-email Сведения о юридическом лице (заявитель). Адрес электронной почты
 * @property string $a_applicant_info-rss-app_legal_person-ogrn Сведения о юридическом лице (заявитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $a_manufacturer_info-rss-man_foreign_legal_person-name Сведения об изготовителе иностранном юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rss-man_foreign_legal_person-address Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rss-man_legal_person-name Сведения о юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rss-man_legal_person-address Сведения о юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rss-man_legal_person-phone Сведения о юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rss-man_legal_person-fax Сведения о юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rss-man_legal_person-email Сведения о юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rss-man_legal_person-ogrn Сведения о юридическом лице (изготовитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $cert_doc_issued-document_info Сведения о документах, на основании которых выдан сертификат. Представленные документы
 * @property string $cert_doc_issued-testing_lab-0-basis_for_certificate Сведения о документах, на основании которых выдан сертификат. Основание выдачи сертификата
 * @property string $cert_doc_issued-testing_lab-1-basis_for_certificate Сведения об испытательной лаборатории. Основание выдачи сертификата
 * @property string $cert_doc_issued-testing_lab-0-reg_number Сведения об испытательной лаборатории. Регистрационный номер аттестата аккредитации
 * @property string $a_cert_doc_issued-rss-cert_doc_issued-additional_info Сведения об испытательной лаборатории. Дополнительная информация
 * @property string $a_product_info-rss-product_ts-object_type_cert Сведения о продукции. «Тип объекта сертификации»: серийный выпуск, партия, единичное изделие
 * @property string $a_product_info-rss-product_ts-product_type Сведения о продукции. Вид продукции
 * @property string $a_product_info-rss-product_ts-product_name Сведения о продукции. Полное наименование продукции
 * @property string $a_product_info-rss-product_ts-product_info Сведения о продукции. Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $a_product_info-rss-product_ts-okpd2 Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rss-product_ts-okpd2_text Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rss-product_ts-tn_ved Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rss-product_ts-tn_ved_text Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rss-product_ts-name_doc_made_product Сведения о продукции. Наименование и реквизиты документа, в соответствии с которыми изготовлена продукция
 * @property string $a_product_info-rss-product_ts-product_info_ext Сведения о продукции. Иная информация, идентифицирующая продукцию
 * @property string $a_product_info-rss-product_ts-serial_number_product Сведения о продукции. Размер партии или заводской номер изделия
 * @property string $a_product_info-rss-product_ts-requisites_doc Сведения о продукции. Реквизиты товаросопроводительной документации
 * @property string $tech_reg Сведения о документах, на основании которых изготовлена продукция. Технический регламент
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property string $a_info_pril Сведения о приложениях к сертификату. Сведения о приложении (приложениях) к сертификату
 * @property string $a_apps-free_form Сведения о приложениях к сертификату. Свободная форма
 * @property string $a_apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rss-table_standart_designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rss-table_standart_name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rss-table_standart_confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_free_form Сведения о приложениях к сертификату. Прочие сведения о сертификате соответствия
 * @property string $a_reg_number Реквизиты сертификата. Регистрационный номер
 * @property string $a_blank_number Реквизиты сертификата. Номер бланка
 * @property string $a_date_begin Реквизиты сертификата. Дата начала действия
 * @property string $a_date_finish Реквизиты сертификата. Дата окончания действия
 * @property string $a_is_date_finish Реквизиты сертификата. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonApplicantType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonDirectorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantInfoRssAppLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAApplicantOrgTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAAppsFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereACertDocIssuedRssCertDocIssuedAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereACertTsTypeTs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereACertTypeCertTs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereADateBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereADateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAInfoPril($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAIsDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManForeignLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManForeignLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerInfoRssManLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAManufacturerTypeIul($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsNameDocMadeProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsObjectTypeCert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsOkpd2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsOkpd2Text($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsProductInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsProductInfoExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsProductType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsRequisitesDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsSerialNumberProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsTnVed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereAProductInfoRssProductTsTnVedText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCERTNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCertDocIssuedDocumentInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCertDocIssuedTestingLab0BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCertDocIssuedTestingLab0RegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCertDocIssuedTestingLab1BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereRssTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereRssTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereRssTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereTechReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssTsPub whereUpdatedAt($value)
 */
	class RssTsPub extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RdsPubGostR
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $DECL_NUM Номер декларации
 * @property string $a_cert_type-cert_gost_r Выбор раздела
 * @property string $a_applicant_org_type-ul Сведения о заявителе, изготовителе, продукции. Тип заявителя
 * @property string $a_manufacturer_type-iul Сведения о заявителе, изготовителе, продукции. Тип изготовителя
 * @property string $a_applicant_info-rds-app_legal_person-applicant_type Сведения о юридическом лице (заявитель). Тип декларанта
 * @property string $a_applicant_info-rds-app_legal_person-legal_form Сведения о юридическом лице (заявитель). Организационно-правовая форма
 * @property string $a_applicant_info-rds-app_legal_person-name Сведения о юридическом лице (заявитель). Полное наименование
 * @property string $a_applicant_info-rds-app_legal_person-short_name_gost_r Сведения о юридическом лице (заявитель). Сокращенное наименование
 * @property string $a_applicant_info-rds-app_legal_person-director_name Сведения о юридическом лице (заявитель). ФИО руководителя
 * @property string $a_applicant_info-rds-app_legal_person-address Сведения о юридическом лице (заявитель). Адрес места нахождения
 * @property string $a_applicant_info-rds-app_legal_person-phone Сведения о юридическом лице (заявитель). Номер телефона
 * @property string $a_applicant_info-rds-app_legal_person-fax Сведения о юридическом лице (заявитель). Номер факса
 * @property string $a_applicant_info-rds-app_legal_person-email Сведения о юридическом лице (заявитель). Адрес электронной почты
 * @property string $a_applicant_info-rds-app_legal_person-ogrn Сведения о юридическом лице (заявитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-name Сведения об изготовителе иностранном юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-address Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-address_actual Сведения об изготовителе иностранном юридическом лице (изготовитель). Фактический адрес
 * @property string $a_manufacturer_info-rds-man_legal_person-name Сведения о юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_legal_person-address Сведения о юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_legal_person-phone Сведения о юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rds-man_legal_person-fax Сведения о юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rds-man_legal_person-email Сведения о юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rds-man_legal_person-ogrn Сведения о юридическом лице (изготовитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $cert_doc_issued-document_info Сведения о документах, на основании которых выдана декларация. Представленные документы
 * @property string $cert_doc_issued-certification_scheme Сведения о документах, на основании которых выдана декларация. Схема декларирования
 * @property string $cert_doc_issued-testing_lab-0-basis_for_certificate Сведения о документах, на основании которых выдана декларация. Основание выдачи декларации
 * @property string $cert_doc_issued-testing_lab-1-basis_for_certificate Сведения об испытательной лаборатории. Основание выдачи сертификата
 * @property string $cert_doc_issued-testing_lab-0-reg_number Сведения об испытательной лаборатории. Регистрационный номер
 * @property string $cert_doc_issued-testing_lab-0-name Сведения об испытательной лаборатории. Нaименование испытательной лаборатории (центра)
 * @property string $cert_doc_issued-testing_lab-0-date_reg Сведения об испытательной лаборатории. Дата аккредитации
 * @property string $a_cert_doc_issued-rds-cert_doc_issued-additional_info Сведения об испытательной лаборатории. Дополнительная информация
 * @property string $a_product_info-rds-product_gost_r-object_type_cert Сведения о продукции. «Тип объекта сертификации»: серийный выпуск, партия, единичное изделие
 * @property string $a_product_info-rds-product_gost_r-product_type Сведения о продукции. Вид продукции
 * @property string $a_product_info-rds-product_gost_r-product_name Сведения о продукции. Полное наименование продукции
 * @property string $a_product_info-rds-product_gost_r-product_info Сведения о продукции. Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $a_product_info-rds-product_gost_r-okp Сведения о продукции. Код ОКП
 * @property string $a_product_info-rds-product_gost_r-okp_text Сведения о продукции. Код ОКП
 * @property string $a_product_info-rds-product_gost_r-okpd2 Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_gost_r-okpd2_text Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_gost_r-tn_ved Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_gost_r-tn_ved_text Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_gost_r-name_doc_made_product Сведения о продукции. Наименование и реквизиты документа, в соответствии с которыми изготовлена продукция
 * @property string $a_product_info-rds-product_gost_r-product_info_ext Сведения о продукции. Иная информация, идентифицирующая продукцию
 * @property string $a_product_info-rds-product_gost_r-serial_number_product Сведения о продукции. Размер партии или заводской номер изделия
 * @property string $a_product_info-rds-product_gost_r-requisites_doc Сведения о продукции. Реквизиты товаросопроводительной документации
 * @property string $rds-standart_requlations-notation_national_standart Сведения о документах, соответствие которым подтверждено декларацией. Обозначение национального стандарта или свода правил
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property string $a_info_pril Сведения о приложениях к сертификату. Сведения о приложении (приложениях) к сертификату
 * @property string $a_apps-free_form Сведения о приложениях к сертификату. Свободная форма
 * @property string $a_apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rss-table_standart_designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rss-table_standart_name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rss-table_standart_confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_free_form Сведения о приложениях к сертификату. Прочие сведения о сертификате соответствия
 * @property string $a_reg_number Реквизиты сертификата. Регистрационный номер
 * @property string $a_blank_number Реквизиты сертификата. Номер бланка
 * @property string $a_date_begin Реквизиты сертификата. Дата начала действия
 * @property string $a_date_finish Реквизиты сертификата. Дата окончания действия
 * @property string $a_is_date_finish Реквизиты сертификата. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonApplicantType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonDirectorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonLegalForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantInfoRdsAppLegalPersonShortNameGostR($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAApplicantOrgTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAAppsFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereACertDocIssuedRdsCertDocIssuedAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereACertTypeCertGostR($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereADateBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereADateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAInfoPril($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAIsDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManForeignLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManForeignLegalPersonAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManForeignLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerInfoRdsManLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAManufacturerTypeIul($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRNameDocMadeProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRObjectTypeCert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostROkp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostROkpText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostROkpd2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostROkpd2Text($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRProductInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRProductInfoExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRProductType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRRequisitesDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRSerialNumberProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRTnVed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereAProductInfoRdsProductGostRTnVedText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedCertificationScheme($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedDocumentInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedTestingLab0BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedTestingLab0DateReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedTestingLab0Name($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedTestingLab0RegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCertDocIssuedTestingLab1BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereDECLNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereRdsStandartRequlationsNotationNationalStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereRssTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereRssTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereRssTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsPubGostR whereUpdatedAt($value)
 */
	class RdsPubGostR extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Useragent
 *
 * @property int $useragent_id
 * @property string $useragent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Useragent whereUseragent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Useragent whereUseragentId($value)
 * @mixin \Eloquent
 */
	class Useragent extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RdsTsPub
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $DECL_NUM Номер декларации
 * @property string $a_cert_type-cert_ts Выбор раздела. Раздел реестра
 * @property string $a_cert_ts_type-ts Выбор раздела. Подраздел реестра
 * @property string $a_applicant_org_type-ul Сведения о заявителе, изготовителе, продукции. Тип заявителя
 * @property string $a_manufacturer_type-ul Сведения о заявителе, изготовителе, продукции. Тип изготовителя
 * @property string $a_applicant_info-rds-app_legal_person-applicant_type Сведения о юридическом лице (заявитель). Тип декларанта
 * @property string $a_applicant_info-rds-app_legal_person-name Сведения о юридическом лице (заявитель). Полное наименование
 * @property string $a_applicant_info-rds-app_legal_person-director_name Сведения о юридическом лице (заявитель). ФИО руководителя
 * @property string $a_applicant_info-rds-app_legal_person-address Сведения о юридическом лице (заявитель). Адрес места нахождения
 * @property string $a_applicant_info-rds-app_legal_person-phone Сведения о юридическом лице (заявитель). Номер телефона
 * @property string $a_applicant_info-rds-app_legal_person-fax Сведения о юридическом лице (заявитель). Номер факса
 * @property string $a_applicant_info-rds-app_legal_person-email Сведения о юридическом лице (заявитель). Адрес электронной почты
 * @property string $a_applicant_info-rds-app_legal_person-ogrn Сведения о юридическом лице (заявитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-name Сведения об изготовителе иностранном юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-address Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-phone Сведения об изготовителе иностранном юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-fax Сведения об изготовителе иностранном юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-email Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rds-man_legal_person-name Сведения о юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_legal_person-address Сведения о юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_legal_person-address_actual Сведения о юридическом лице (изготовитель). Фактический адрес
 * @property string $a_manufacturer_info-rds-man_legal_person-phone Сведения о юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rds-man_legal_person-fax Сведения о юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rds-man_legal_person-email Сведения о юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rds-man_legal_person-ogrn Сведения о юридическом лице (изготовитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $cert_doc_issued-document_info Сведения о документах, на основании которых выдана декларация. Представленные документы
 * @property string $cert_doc_issued-certification_scheme Сведения о документах, на основании которых выдана декларация. Схема декларирования
 * @property string $cert_doc_issued-testing_lab-0-basis_for_certificate Сведения о документах, на основании которых выдана декларация. Основание выдачи декларации
 * @property string $cert_doc_issued-testing_lab-1-basis_for_certificate Сведения об испытательной лаборатории. Основание выдачи декларации
 * @property string $cert_doc_issued-testing_lab-0-reg_number Сведения об испытательной лаборатории. Регистрационный номер
 * @property string $cert_doc_issued-testing_lab-0-name Сведения об испытательной лаборатории. Нaименование испытательной лаборатории (центра)
 * @property string $cert_doc_issued-testing_lab-0-date_reg Сведения об испытательной лаборатории. Дата аккредитации
 * @property string $a_cert_doc_issued-rds-cert_doc_issued-additional_info Сведения об испытательной лаборатории. Дополнительная информация
 * @property string $a_product_info-rds-product_ts-object_type_cert Сведения о продукции. «Тип объекта декларирования»: серийный выпуск, партия, единичное изделие
 * @property string $a_product_info-rds-product_ts-product_type Сведения о продукции. Происхождение продукции
 * @property string $a_product_info-rds-product_ts-product_name Сведения о продукции. Полное наименование продукции
 * @property string $a_product_info-rds-product_ts-product_info Сведения о продукции. Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $a_product_info-rds-product_ts-okpd2 Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_ts-okpd2_text Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_ts-tn_ved Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_ts-tn_ved_text Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_ts-name_doc_made_product Сведения о продукции. Наименование и реквизиты документа, в соответствии с которыми изготовлена продукция
 * @property string $a_product_info-rds-product_ts-product_info_ext Сведения о продукции. Иная информация, идентифицирующая продукцию
 * @property string $a_product_info-rds-product_ts-serial_number_product Сведения о продукции. Размер партии или заводской номер изделия
 * @property string $a_product_info-rds-product_ts-requisites_doc Сведения о продукции. Реквизиты товаросопроводительной документации
 * @property string $tech_reg Сведения о продукции. Технический регламент
 * @property string $tech_reg_ext Сведения о продукции. Дополнительные сведения о технических регламентах
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property string $a_info_pril Сведения о приложениях к сертификату. Сведения о приложении (приложениях) к сертификату
 * @property string $a_apps-free_form Сведения о приложениях к сертификату. Свободная форма
 * @property string $a_apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rds-table_standart_designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rds-table_standart_name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rds-table_standart_confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_free_form Сведения о приложениях к сертификату. Прочие сведения о сертификате соответствия
 * @property string $a_reg_number Реквизиты декларации. Регистрационный номер
 * @property string $a_blank_number Реквизиты декларации. Номер бланка
 * @property string $a_date_begin Реквизиты декларации. Дата начала действия
 * @property string $a_date_finish Реквизиты декларации. Дата окончания действия
 * @property string $a_is_date_finish Реквизиты декларации. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonApplicantType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonDirectorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantInfoRdsAppLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAApplicantOrgTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAAppsFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereACertDocIssuedRdsCertDocIssuedAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereACertTsTypeTs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereACertTypeCertTs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereADateBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereADateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAInfoPril($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAIsDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManForeignLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManForeignLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManForeignLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManForeignLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManForeignLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerInfoRdsManLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAManufacturerTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsNameDocMadeProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsObjectTypeCert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsOkpd2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsOkpd2Text($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsProductInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsProductInfoExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsProductType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsRequisitesDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsSerialNumberProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsTnVed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereAProductInfoRdsProductTsTnVedText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedCertificationScheme($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedDocumentInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedTestingLab0BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedTestingLab0DateReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedTestingLab0Name($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedTestingLab0RegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCertDocIssuedTestingLab1BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereDECLNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereRdsTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereRdsTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereRdsTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereTechReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereTechRegExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsTsPub whereUpdatedAt($value)
 */
	class RdsTsPub extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RdsRfPub
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $DECL_NUM Номер декларации
 * @property string $a_cert_type-cert_rf Выбор раздела
 * @property string $a_applicant_org_type-ul Сведения о заявителе, изготовителе, продукции. Тип заявителя
 * @property string $a_manufacturer_type-ul Сведения о заявителе, изготовителе, продукции. Тип изготовителя
 * @property string $a_applicant_info-rds-app_legal_person-applicant_type Сведения о юридическом лице (заявитель). Тип декларанта
 * @property string $a_applicant_info-rds-app_legal_person-name Сведения о юридическом лице (заявитель). Полное наименование
 * @property string $a_applicant_info-rds-app_legal_person-director_name Сведения о юридическом лице (заявитель). ФИО руководителя
 * @property string $a_applicant_info-rds-app_legal_person-address Сведения о юридическом лице (заявитель). Адрес места нахождения
 * @property string $a_applicant_info-rds-app_legal_person-phone Сведения о юридическом лице (заявитель). Номер телефона
 * @property string $a_applicant_info-rds-app_legal_person-fax Сведения о юридическом лице (заявитель). Номер факса
 * @property string $a_applicant_info-rds-app_legal_person-email Сведения о юридическом лице (заявитель). Адрес электронной почты
 * @property string $a_applicant_info-rds-app_legal_person-ogrn Сведения о юридическом лице (заявитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-name Сведения об изготовителе иностранном юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-address Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-phone Сведения об изготовителе иностранном юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-fax Сведения об изготовителе иностранном юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rds-man_foreign_legal_person-email Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rds-man_legal_person-name Сведения о юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rds-man_legal_person-address Сведения о юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rds-man_legal_person-phone Сведения о юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rds-man_legal_person-fax Сведения о юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rds-man_legal_person-email Сведения о юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rds-man_legal_person-ogrn Сведения о юридическом лице (изготовитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $cert_doc_issued-document_info Сведения о документах, на основании которых выдана декларация. Представленные документы
 * @property string $cert_doc_issued-certification_scheme Сведения о документах, на основании которых выдана декларация. Схема декларирования
 * @property string $cert_doc_issued-testing_lab-0-basis_for_certificate Сведения о документах, на основании которых выдана декларация. Основание выдачи декларации
 * @property string $cert_doc_issued-testing_lab-1-basis_for_certificate Сведения об испытательной лаборатории. Основание выдачи декларации
 * @property string $cert_doc_issued-testing_lab-0-reg_number Сведения об испытательной лаборатории. Регистрационный номер
 * @property string $cert_doc_issued-testing_lab-0-name Сведения об испытательной лаборатории. Нaименование испытательной лаборатории (центра)
 * @property string $cert_doc_issued-testing_lab-0-date_reg Сведения об испытательной лаборатории. Дата аккредитации
 * @property string $a_cert_doc_issued-rds-cert_doc_issued-additional_info Сведения об испытательной лаборатории. Дополнительная информация
 * @property string $a_product_info-rds-product_rf-object_type_cert Сведения о продукции. «Тип объекта декларирования»: серийный выпуск, партия, единичное изделие
 * @property string $a_product_info-rds-product_rf-product_type Сведения о продукции. Происхождение продукции
 * @property string $a_product_info-rds-product_rf-product_name Сведения о продукции. Полное наименование продукции
 * @property string $a_product_info-rds-product_rf-product_info Сведения о продукции. Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $a_product_info-rds-product_rf-okpd2 Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_rf-okpd2_text Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rds-product_rf-tn_ved Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_rf-tn_ved_text Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rds-product_rf-name_doc_made_product Сведения о продукции. Наименование и реквизиты документа, в соответствии с которыми изготовлена продукция
 * @property string $a_product_info-rds-product_rf-product_info_ext Сведения о продукции. Иная информация, идентифицирующая продукцию
 * @property string $a_product_info-rds-product_rf-serial_number_product Сведения о продукции. Размер партии или заводской номер изделия
 * @property string $a_product_info-rds-product_rf-requisites_doc Сведения о продукции. Реквизиты товаросопроводительной документации
 * @property string $tech_reg Сведения о продукции. Технический регламент
 * @property string $tech_reg_ext Сведения о продукции. Дополнительные сведения о технических регламентах
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property string $a_info_pril Сведения о приложениях к сертификату. Сведения о приложении (приложениях) к сертификату
 * @property string $a_apps-free_form Сведения о приложениях к сертификату. Свободная форма
 * @property string $a_apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rds-table_standart_designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rds-table_standart_name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rds-table_standart_confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_free_form Сведения о приложениях к сертификату. Прочие сведения о сертификате соответствия
 * @property string $a_reg_number Реквизиты декларации. Регистрационный номер
 * @property string $a_blank_number Реквизиты декларации. Номер бланка
 * @property string $a_date_begin Реквизиты декларации. Дата начала действия
 * @property string $a_date_finish Реквизиты декларации. Дата окончания действия
 * @property string $a_is_date_finish Реквизиты декларации. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonApplicantType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonDirectorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantInfoRdsAppLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAApplicantOrgTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAAppsFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereACertDocIssuedRdsCertDocIssuedAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereACertTypeCertRf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereADateBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereADateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAInfoPril($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAIsDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManForeignLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManForeignLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManForeignLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManForeignLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManForeignLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerInfoRdsManLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAManufacturerTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfNameDocMadeProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfObjectTypeCert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfOkpd2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfOkpd2Text($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfProductInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfProductInfoExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfProductType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfRequisitesDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfSerialNumberProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfTnVed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereAProductInfoRdsProductRfTnVedText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedCertificationScheme($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedDocumentInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedTestingLab0BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedTestingLab0DateReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedTestingLab0Name($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedTestingLab0RegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCertDocIssuedTestingLab1BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereDECLNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereRdsTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereRdsTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereRdsTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereTechReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereTechRegExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RdsRfPub whereUpdatedAt($value)
 */
	class RdsRfPub extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ProcessParsingLog
 *
 * @property int $id
 * @property string $process
 * @property string $begin
 * @property string $end
 * @property string $donor_class_name
 * @property string $source
 * @property string $write_begin
 * @property string $write_end
 * @property string $message
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereDonorClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereProcess($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereWriteBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProcessParsingLog whereWriteEnd($value)
 * @mixin \Eloquent
 */
	class ProcessParsingLog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ActivityLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property string $ip_address
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereIpAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ActivityLog whereUserId($value)
 * @mixin \Eloquent
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RssPubGostR
 *
 * @property int $id
 * @property string $STATUS Статус
 * @property string $CERT_NUM Номер сертификата
 * @property string $a_cert_type-cert_gost_r Выбор раздела
 * @property string $a_applicant_org_type-ul Сведения о заявителе, изготовителе, продукции. Тип заявителя
 * @property string $a_manufacturer_type-ul Сведения о заявителе, изготовителе, продукции. Тип изготовителя
 * @property string $a_applicant_info-rss-app_legal_person-applicant_type Сведения о юридическом лице (заявитель). Вид заявителя
 * @property string $a_applicant_info-rss-app_legal_person-name Сведения о юридическом лице (заявитель). Полное наименование
 * @property string $a_applicant_info-rss-app_legal_person-director_name Сведения о юридическом лице (заявитель). ФИО руководителя
 * @property string $a_applicant_info-rss-app_legal_person-address Сведения о юридическом лице (заявитель). Адрес места нахождения
 * @property string $a_applicant_info-rss-app_legal_person-phone Сведения о юридическом лице (заявитель). Номер телефона
 * @property string $a_applicant_info-rss-app_legal_person-fax Сведения о юридическом лице (заявитель). Номер факса
 * @property string $a_applicant_info-rss-app_legal_person-email Сведения о юридическом лице (заявитель). Адрес электронной почты
 * @property string $a_applicant_info-rss-app_legal_person-ogrn Сведения о юридическом лице (заявитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $a_manufacturer_info-rss-man_foreign_legal_person-name Сведения об изготовителе иностранном юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rss-man_foreign_legal_person-address Сведения об изготовителе иностранном юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rss-man_legal_person-name Сведения о юридическом лице (изготовитель). Полное наименование
 * @property string $a_manufacturer_info-rss-man_legal_person-address Сведения о юридическом лице (изготовитель). Адрес места нахождения
 * @property string $a_manufacturer_info-rss-man_legal_person-phone Сведения о юридическом лице (изготовитель). Номер телефона
 * @property string $a_manufacturer_info-rss-man_legal_person-fax Сведения о юридическом лице (изготовитель). Номер факса
 * @property string $a_manufacturer_info-rss-man_legal_person-email Сведения о юридическом лице (изготовитель). Адрес электронной почты
 * @property string $a_manufacturer_info-rss-man_legal_person-ogrn Сведения о юридическом лице (изготовитель). Основной государственный регистрационный номер записи о государственной регистрации юридического лица (ОГРН)
 * @property string $cert_doc_issued-document_info Сведения о документах, на основании которых выдан сертификат. Представленные документы
 * @property string $cert_doc_issued-testing_lab-0-basis_for_certificate Сведения о документах, на основании которых выдан сертификат. Основание выдачи сертификата
 * @property string $cert_doc_issued-testing_lab-1-basis_for_certificate Сведения об испытательной лаборатории. Основание выдачи сертификата
 * @property string $cert_doc_issued-testing_lab-0-reg_number Сведения об испытательной лаборатории. Регистрационный номер аттестата аккредитации
 * @property string $a_cert_doc_issued-rss-cert_doc_issued-additional_info Сведения об испытательной лаборатории. Дополнительная информация
 * @property string $a_product_info-rss-product_gost_r-object_type_cert Сведения о продукции. «Тип объекта сертификации»: серийный выпуск, партия, единичное изделие
 * @property string $a_product_info-rss-product_gost_r-product_type Сведения о продукции. Вид продукции
 * @property string $a_product_info-rss-product_gost_r-product_name Сведения о продукции. Полное наименование продукции
 * @property string $a_product_info-rss-product_gost_r-product_info Сведения о продукции. Сведения о продукции (тип, марка, модель, сорт, артикул и др.), обеспечивающие ее идентификацию
 * @property string $a_product_info-rss-product_gost_r-okpd2 Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rss-product_gost_r-okpd2_text Сведения о продукции. Коды ОКПД 2
 * @property string $a_product_info-rss-product_gost_r-tn_ved Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rss-product_gost_r-tn_ved_text Сведения о продукции. Код ТН ВЭД ЕАЭС
 * @property string $a_product_info-rss-product_gost_r-name_doc_made_product Сведения о продукции. Наименование и реквизиты документа, в соответствии с которыми изготовлена продукция
 * @property string $a_product_info-rss-product_gost_r-product_info_ext Сведения о продукции. Иная информация, идентифицирующая продукцию
 * @property string $a_product_info-rss-product_gost_r-serial_number_product Сведения о продукции. Размер партии или заводской номер изделия
 * @property string $a_product_info-rss-product_gost_r-requisites_doc Сведения о продукции. Реквизиты товаросопроводительной документации
 * @property string $tech_reg Сведения о документах, на основании которых изготовлена продукция. Технический регламент
 * @property string $a_expert-0-last_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Фамилия
 * @property string $a_expert-0-first_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Имя
 * @property string $a_expert-0-patr_name Cведения об экспертах по сертификации, проводивших работы по сертификации. Отчество
 * @property string $organ_to_certification-name Сведения об органе по сертификации. Полное наименование
 * @property string $organ_to_certification-reg_number Сведения об органе по сертификации. Номер аттестата
 * @property string $organ_to_certification-reg_date Сведения об органе по сертификации. Дата регистрации аттестата
 * @property string $organ_to_certification-head_name Сведения об органе по сертификации. ФИО руководителя
 * @property string $organ_to_certification-address Сведения об органе по сертификации. Юридический адрес
 * @property string $organ_to_certification-address_actual Сведения об органе по сертификации. Адрес места нахождения
 * @property string $organ_to_certification-phone Сведения об органе по сертификации. Номер телефона
 * @property string $organ_to_certification-fax Сведения об органе по сертификации. Номер факса
 * @property string $organ_to_certification-email Сведения об органе по сертификации. Адрес электронной почты
 * @property string $a_info_pril Сведения о приложениях к сертификату. Сведения о приложении (приложениях) к сертификату
 * @property string $a_apps-free_form Сведения о приложениях к сертификату. Свободная форма
 * @property string $a_apps-table_standart Сведения о приложениях к сертификату. Таблица стандартов
 * @property string $a_table_standart_number Сведения о приложениях к сертификату. Номер бланка приложения к СС для таблицы стандартов
 * @property string $rss-table_standart_designation Сведения о приложениях к сертификату. Обозначение национального стандарта или свода правил
 * @property string $rss-table_standart_name Сведения о приложениях к сертификату. Наименование национального стандарта или свода правил
 * @property string $rss-table_standart_confirmation_requirements Сведения о приложениях к сертификату. Подтверждение требованиям национального стандарта или свода правил
 * @property string $a_free_form Сведения о приложениях к сертификату. Прочие сведения о сертификате соответствия
 * @property string $a_reg_number Реквизиты сертификата. Регистрационный номер
 * @property string $a_blank_number Реквизиты сертификата. Номер бланка
 * @property string $a_date_begin Реквизиты сертификата. Дата начала действия
 * @property string $a_date_finish Реквизиты сертификата. Дата окончания действия
 * @property string $a_is_date_finish Реквизиты сертификата. Без срока действия
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonApplicantType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonDirectorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantInfoRssAppLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAApplicantOrgTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAAppsFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAAppsTableStandart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereABlankNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereACertDocIssuedRssCertDocIssuedAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereACertTypeCertGostR($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereADateBegin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereADateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAExpert0FirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAExpert0LastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAExpert0PatrName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAFreeForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAInfoPril($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAIsDateFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManForeignLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManForeignLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonOgrn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerInfoRssManLegalPersonPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAManufacturerTypeUl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRNameDocMadeProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRObjectTypeCert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostROkpd2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostROkpd2Text($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRProductInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRProductInfoExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRProductType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRRequisitesDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRSerialNumberProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRTnVed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereAProductInfoRssProductGostRTnVedText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereARegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereATableStandartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCERTNUM($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCertDocIssuedDocumentInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCertDocIssuedTestingLab0BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCertDocIssuedTestingLab0RegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCertDocIssuedTestingLab1BasisForCertificate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationAddressActual($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationHeadName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationRegDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereOrganToCertificationRegNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereRssTableStandartConfirmationRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereRssTableStandartDesignation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereRssTableStandartName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereTechReg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RssPubGostR whereUpdatedAt($value)
 */
	class RssPubGostR extends \Eloquent {}
}

