<?php

/**
 * monitor
 *
 * @package monitor
 * @copyright   2016 Uemanet
 * @author      Lucas Vieira
 */

class local_monitor_external extends external_api
{
    private static $day = 60 * 60 * 24;
    private static $session = 21;

    /**
     * Returns default values for get_online_tutors_parameters
     * @return array
     */
    private static function get_online_time_default_parameters()
    {
        return [
            'time_between_clicks' => 60,
            'start_date' => gmdate('d-m-Y', mktime(0, 0, 0, date('m'), date('d') - 7, date('Y'))),
            'end_date' => gmdate('d-m-Y', mktime(0, 0, 0, date('m'), date('d'), date('Y')))
        ];
    }

    /**
     * Returns description of get_online_time parameters
     * @return external_function_parameters
     */
    public static function get_online_time_parameters()
    {
        $default = local_monitor_external::get_online_time_default_parameters();

        return new external_function_parameters(array(
                'time_between_clicks' => new external_value(PARAM_INT, 'Tempo entre os clicks', VALUE_DEFAULT, $default['time_between_clicks']),
                'start_date' => new external_value(PARAM_TEXT, 'Data de início da consulta: dd-mm-YYYY', VALUE_DEFAULT, $default['start_date']),
                'end_date' => new external_value(PARAM_TEXT, 'Data de fim da consulta: dd-mm-YYYY', VALUE_DEFAULT, $default['end_date']),
                'tutor' => new external_value(PARAM_TEXT, 'ID do Tutor', VALUE_DEFAULT
                )
            )
        );
    }

    public static function get_online_time($timeBetweenClicks, $startDate, $endDate, $tutor)
    {
        global $DB;

        self::validate_parameters(self::get_online_time_parameters(), array(
                'time_between_clicks' => $timeBetweenClicks,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'tutor' => $tutor,
            )
        );
        // Todo: Implementar retorno do tempo diario de acesso do tutor ao ambiente
        return json_encode(["Tutor" => "Testando"]);
    }

    /**
     * Returns description of get_online_time return values
     * @return external_value
     */
    public static function get_online_time_returns()
    {
        // Todo: Implementar saida adequada com padrão REST
        return new external_value(PARAM_TEXT, 'Retorna o tempo durante o qual o tutor esteve online');
    }
}
