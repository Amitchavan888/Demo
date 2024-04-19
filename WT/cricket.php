<?php
// Create a SimpleXMLElement object
$cricket = new SimpleXMLElement('<CricketTeam></CricketTeam>');

// Add a Team element for Australia
$team_australia = $cricket->addChild('Team');
$team_australia->addAttribute('country', 'Australia');
$team_australia->addChild('player', 'PlayerName1');
$team_australia->addChild('runs', '100');
$team_australia->addChild('wicket', '2');

// Save the XML to a file
$cricket->asXML('cricket.xml');

// Load the existing XML file
$cricket = simplexml_load_file('cricket.xml');

// Add elements for Team India
$team_india = $cricket->addChild('Team');
$team_india->addAttribute('country', 'India');
$team_india->addChild('player', 'PlayerName2');
$team_india->addChild('runs', '150');
$team_india->addChild('wicket', '3');

// Add more elements for Team India
$team_india = $cricket->addChild('Team');
$team_india->addAttribute('country', 'India');
$team_india->addChild('player', 'PlayerName3');
$team_india->addChild('runs', '80');
$team_india->addChild('wicket', '1');

// Save the modified XML to the same file
$cricket->asXML('cricket.xml');

echo "Elements added successfully to cricket.xml file.";
?>
