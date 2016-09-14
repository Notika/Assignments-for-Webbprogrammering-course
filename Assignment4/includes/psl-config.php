<?php
/*** These are the database login details */

define("HOST", "localhost"); 		// The host you want to connect to. 
define("USER", "AC9496"); 		// The database username. 
define("PASSWORD", "valeria"); 	// The database password. 
define("DATABASE", "ac9496");           // The database name.

/**
 * Who can register and what the default role will be
 * Values for who can register can be:
 *      any  == anybody can register (default)
 *      admin == members must be registered by an administrator
 *      root  == only the root user can register members
 * Values for default role can be any valid role, but it's hard to see why
 * the default 'member' value should be changed under the standard setup.
 */
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("SECURE", FALSE);    // Development only!!!!

