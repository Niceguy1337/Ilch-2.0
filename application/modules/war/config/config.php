<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\War\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'war',
        'author' => 'Stantin, Thomas',
        'icon_small' => 'fa-shield',
        'languages' => [
            'de_DE' => [
                'name' => 'War',
                'description' => 'Hier können die Wars verwaltet werden.',
            ],
            'en_EN' => [
                'name' => 'War',
                'description' => 'Here you can manage the wars.',
            ],
        ]
    ];

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
    }

    public function uninstall()
    {
        $this->db()->queryMulti('DROP TABLE `[prefix]_war`');
        $this->db()->queryMulti('DROP TABLE `[prefix]_war_groups`');
        $this->db()->queryMulti('DROP TABLE `[prefix]_war_enemy`');
        $this->db()->queryMulti('DROP TABLE `[prefix]_war_played`');
    }

    public function getInstallSql()
    {
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_war_groups` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(32) NOT NULL,
                  `tag` varchar(20) NOT NULL,
                  `image` varchar(256) NOT NULL,
                  `member` int(11) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

                CREATE TABLE IF NOT EXISTS `[prefix]_war_enemy` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(150) NOT NULL,
                  `tag` varchar(20) NOT NULL,
                  `homepage` varchar(150) NOT NULL,
                  `image` varchar(256) NOT NULL,
                  `land` varchar(50) NOT NULL,
                  `contact_name` varchar(50) NOT NULL,
                  `contact_email` varchar(150) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

                CREATE TABLE IF NOT EXISTS `[prefix]_war` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `enemy` int(11) NOT NULL,
                  `group` int(11) NOT NULL,
                  `time` datetime NOT NULL,
                  `maps` varchar(256) NOT NULL,
                  `server` varchar(256) NOT NULL,
                  `password` varchar(256) NOT NULL,
                  `xonx` varchar(50) NOT NULL,
                  `game` varchar(256) NOT NULL,
                  `matchtype` varchar(256) NOT NULL,
                  `report` text NOT NULL,
                  `status` tinyint(1) NOT NULL DEFAULT 0,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

                CREATE TABLE IF NOT EXISTS `[prefix]_war_played` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `war_id` int(11) DEFAULT NULL,
                  `map` varchar(256) NOT NULL DEFAULT "",
                  `group_pionts` mediumint(9) DEFAULT NULL,
                  `enemy_pionts` mediumint(9) DEFAULT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;';
    }

    public function getUpdate()
    {

    }
}
