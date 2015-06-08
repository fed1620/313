<?php
/******************************************************************************
* search.php
*
* Author: Federico Martinez
*
* This search method takes a reference to a database, and a string as a parameter.
* The string is then broken up into keywords to determine what type of query to
* use, and whether or not any of the keywords match anything in the database.
*******************************************************************************/

/******************************************************************************
* SEARCH
* This function uses the provided input to build a query
*******************************************************************************/
function search($db, $searchWord, $tableName) 
{
	// Build a query, if there are any matches
	$query = buildQuery($db, $searchWord, $tableName);

	if ($query)
		return $query;
	else
		return FALSE;
}

/******************************************************************************
* BUILD QUERY
* This function uses the provided input to build a query
*******************************************************************************/
function buildQuery($db, $searchWord, $tableName) 
{
	$query = "";     // This will be our MySQL query
	$found = FALSE;  // Whether or not the above query returns any rows

	// Break up the user's input into multiple words (keywords)
	$keywords = explode(" ", $searchWord);

	// This loop will query the database for each individual keyword
	for ($i = 0; $i < str_word_count($searchWord); $i++)
	{
		$searchQuery = $keywords[$i];

		// Insert an apostrophe, if the user forgot to put one 
		$newString = insertApostrophe($searchQuery);
		if ($newString)
			$searchQuery = $newString;

		// Escape any special characters
		$searchQuery = addslashes($searchQuery);

		// Decide which kind of query to make
		$query = determineQueryType($searchQuery, $tableName);

		// If the query returns any rows, return that query
		if (executeQuery($db, $query))
			return $query;
	}
	return FALSE; 
}

/******************************************************************************
* INSERT APOSTROPHE
* This function gives an apostrophe to any word ending in 's'
*******************************************************************************/
function insertApostrophe($searchQuery)
{
	// Split the search query string into an array of characters
	$characterArray = str_split($searchQuery);

	// We're looking for 's' here...
	$length           = strlen($searchQuery);
	$lastCharPosition = strlen($searchQuery) - 1;
	$lastCharacter    = $characterArray[$lastCharPosition];

	// If the string ends in s but isn't preceded by an apostrophe, we'll add one
	if ($length > 2 && $lastCharacter == 's' && $characterArray[$lastCharPosition - 1] != '\'')
	{
		$newString  = substr($searchQuery, 0, $lastCharPosition) . '\'' . substr($searchQuery, $lastCharPosition);
		return $newString;
	}
	return FALSE;
}

/******************************************************************************
* DETERMINE QUERY TYPE
* This function determines which type of query we will use: LIKE or REGEXP
*******************************************************************************/
function determineQueryType($searchQuery, $tableName)
{
	// Do LIKE if they keyword is large enough...
	if (strlen($searchQuery) >= 4)
		return "SELECT * FROM $tableName WHERE name LIKE '%$searchQuery%';";					
	else
		return "SELECT * FROM $tableName WHERE name REGEXP '[[:<:]]" . $searchQuery . "[[:>:]]'";
}

/******************************************************************************
* EXECUTE QUERY
* True if the query returns any rows, false if it comes up empty
*******************************************************************************/
function executeQuery($db, $query)
{
	// Prepare the query statement and execute it
	$statement = $db->prepare($query);
	$statement->execute();

	// Did the query return any rows?
	if ($statement->rowCount() != 0)
		return TRUE;
	else
		return FALSE;
}
?>