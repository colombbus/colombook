<?php

########################################
#                                      #
#       DZCP Driver for Freichat       #
#      DZCP Version: 1.5.x, 1.6.x      #
#      ______________________          #
#                                      #
#           Mod by: Richy              #
#        www.my-starmedia.de           #
#                                      #
########################################




require 'base.php';

class DZCP extends Moderation {

    public function get_users() {
        $query = 'SELECT u.nick as username,u.id as id, COUNT( f.from ) AS no_of_messages,b.user_id as user_id  
									FROM ' . $this->db_prefix . 'users AS u
									LEFT JOIN frei_chat AS f ON f.from = u.id
									LEFT JOIN frei_banned_users AS b ON u.id = b.user_id
									GROUP BY u.id
									ORDER BY u.`level` DESC, u.`nick`';

        $query = $this->db->query($query);
        $result = $query->fetchAll();
        return $result;
    }

}

?>