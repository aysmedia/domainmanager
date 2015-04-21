<?php
/**
 * /cron/checkversion.php
 *
 * This file is part of DomainMOD, an open source domain and internet asset manager.
 * Copyright (C) 2010-2015 Greg Chetcuti <greg@chetcuti.com>
 *
 * Project: http://domainmod.org   Author: http://chetcuti.com
 *
 * DomainMOD is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * DomainMOD is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with DomainMOD. If not, see
 * http://www.gnu.org/licenses/.
 *
 */
?>
<?php
include("../_includes/config.inc.php");
include("../_includes/database.inc.php");
include("../_includes/software.inc.php");
include("../_includes/timestamps/current-timestamp.inc.php");
include("../_includes/system/functions/error-reporting.inc.php");

include("../_includes/config-demo.inc.php");

if ($demo_install != "1") {

    $live_version = file_get_contents('https://raw.githubusercontent.com/domainmod/domainmod/master/version-db.txt');

    if ($most_recent_db_version != $live_version) {

        $sql = "UPDATE settings
                SET upgrade_available = '1'";
        $result = mysqli_query($connection, $sql) or outputOldSqlError($connection);

    } else {

        $sql = "UPDATE settings
                SET upgrade_available = '0'";
        $result = mysqli_query($connection, $sql) or outputOldSqlError($connection);

    }

}