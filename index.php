<?php 	

namespace HouseProject;

class HouseBuilder
{

	//construct the house
	public function __construct($floors,$colour,$type,$town)
	{
		$this->type = $type;
		$this->colour = $colour;
		$this->floors = $floors;
		$this->town = $town;
	}

	//build the house
	public function build()
	{
		 $data = 'This is a '.$this->type.' house<br>';
		 $data .= 'It has '.$this->floors.' Floor(s)<br>';
		 $data .= 'The colour of the house is '.$this->colour.'<br>';
		 $data .= 'House is located in'.$this->town;
		 return $data;
	}

}

$BuildMeAHouse = new HouseBuilder(2,'Red','Semi-Detached','Stevenage');
$GiveMeAHouse = $BuildMeAHouse->build();

echo $GiveMeAHouse;
 ?>
