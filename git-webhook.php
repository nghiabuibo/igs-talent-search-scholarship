<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.
// Give permission to user: chown -R <user> <repo>

echo shell_exec('whoami');

if ( isset($_POST['payload']) ) {
	echo shell_exec( 'git pull 2>&1' );
}