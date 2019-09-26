<?php
$article = array(); 
$jdb = simplexml_load_file("https://openorthopaedicsjournal.com/common-xml/journal-meta.xml");
$jcode= $jdb->{'journal-front'}->{'journal-meta'}->{'journal-id'};
$courrentvolume=$jdb->{'journal-front'}->{'journal-meta'}->{'journal-current-volume'};
 $mcass = simplexml_load_file("https://openorthopaedicsjournal.com/contents/volumes/volume-listing/".$jcode."-V".
 	$courrentvolume.".xml");
//echo $mcass->{'volume-body'}->{'article-list'}->{'article-entry'}->count();
//die();
	//die();
	foreach($mcass->{'volume-body'}->{'article-list'} as $articlelist)
	{    "<br/>";
		 $count=$articlelist->count();
		if($count>1){
		 $cond=$count-4;
		for($i=$count-1;$i>=$cond;$i--)
			{
				//echo "<ul>";
		$article_entry=$articlelist->{'article-entry'}[$i];
	$artfile = simplexml_load_file("https://openorthopaedicsjournal.com/contents/volumes/V".$courrentvolume."/".$article_entry."/".$article_entry.".xml");

			//	echo "<li>";
				  $article_title=$artfile->{'front'}->{'article-meta'}->{'title-group'}->{'article-title'};
				     $articlepdf="https://openorthopaedicsjournal.com/contents/volumes/V".$courrentvolume."/".$article_entry."/".$article_entry.".pdf";
				//echo "</li>";
				//echo "<li>";
				 "<a href='https://openorthopaedicsjournal.com/contents/volumes/V".$courrentvolume."/".$article_entry."/".$article_entry.".pdf'>Download PDF</a>";
				//echo "</li>";
              // echo "</ul>";
				 $names="";
				  foreach ( $artfile->{'front'}->{'article-meta'}->{'contrib-group'}->{'contrib'} as $contrib) {
				 	$author_name=$contrib->{'name'}->{'surname'};
				 	$given_name=$contrib->{'name'}->{'given-names'};
				 	$names.=$author_name." ".$given_name.", ";
				
				 }
				 //array_push($articles, $temp);
				 $articles['name'] = (string)$names;
                 $articles['article_title']=(string)$article_title;
                  $articles['articlepdf']=(string)$articlepdf;
                          array_push($article, $articles);
            
           
        }
	   
	}
}
//var $newArray = $name.concat($articles);

echo json_encode($article);
	die();