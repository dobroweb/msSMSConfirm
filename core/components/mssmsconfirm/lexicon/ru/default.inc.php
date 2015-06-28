<?php

$_lang['mssmsconfirm'] = 'msSMSConfirm';
$_lang['mssc_form_code'] = 'Код подтверждения';
$_lang['mssc_form_sms_request'] = 'Отправить код ещё раз';
$_lang['mssc_form_confirm'] = 'Подтвердить';
$_lang['mssc_err_needphone'] = 'Пожалуйста, укажите номер телефона';
$_lang['mssc_err_needcode'] = 'Для подтверждения заказа укажите код из СМС';
$_lang['mssc_err_smsrequest'] = 'Вам был повторно отправлен код подтверждения заказа';
$_lang['mssc_err_invalidcode'] = 'Неправильно указан код подтверждения заказа';
$_lang['mssc_err_notsend'] = 'Возникла системная ошибка при отправке СМС';
$_lang['mssc_sms_content'] = 'Код подтверждения заказа [[+code]]';
$_lang['area_mssc_main'] = 'Основные';
$_lang['setting_mssc_active'] = 'Включить компонент';
$_lang['setting_mssc_active_desc'] = 'Если компонент включён, то необходимо подтверждать заказы по SMS.';
$_lang['setting_mssc_front_js'] = 'Файл с Javascript';
$_lang['setting_mssc_front_js_desc'] = 'Путь к файлу с Javascript для подключения на фронте сайта.';
$_lang['setting_mssc_send_snippet'] = 'Сниппет отправки SMS';
$_lang['setting_mssc_send_snippet_desc'] = 'Укажите сниппет и его параметры, с помощью которого будут отправляться SMS. Используйте плейсхолдеры [[+phone]] и [[+message]] для указания номера телефона клиента и сообщения, которое будет отправлено, соответственно. Телефон берётся из формы заказа, а текст сообщения изменяется в словаре.';
$_lang['setting_mssc_users_exclude'] = 'Исключить пользователей';
$_lang['setting_mssc_users_exclude_desc'] = 'Укажите пользователей, которым не нужно подтверждать заказы по SMS. Если вы хотите, чтобы необходимость подтверждать заказы была только у неавторизованных пользователей, поставьте значение опции <b>`*`</b>';
