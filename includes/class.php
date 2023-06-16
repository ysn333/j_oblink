<?php

class JobOffer {
    private $JobTitle;
    private $companyName;
    private $jobDescription;
    private $location;
    private $postDate;
    private $img;
    private $JobID;

    public function __construct($JobTitle, $companyName, $jobDescription, $location, $postDate , $img , $JobID) {
        $this->jobTitle = $JobTitle;
        $this->companyName = $companyName;
        $this->jobDescription = $jobDescription;
        $this->location = $location;
        $this->postDate = $postDate;
        $this->img = $img;
        $this->JobID = $JobID ;
    }

    public function displayCard() {
        echo "<div class='col-sm-12 col-md-2 col-lg-4 mb-3'>";
        echo "<a href='details_job.php?id=$this->JobID'>";
        echo "<div class='card'>";
        echo "<img src='uploads/profiles/$this->img' class='card-img-top' alt='Card Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$this->jobTitle</h5>";
        echo "<h6 class='card-subtitle mb-2 text-muted'>$this->companyName</h6>";
        echo "</a>";
        $description = substr($this->jobDescription, 0, 50);
        echo "<p class='card-text'>- $description...</p>";
        echo "<div class='card-bottom'>";
        echo "<p class='card-location'>$this->location</p>";
        echo "<br><p class='card-date'> <bdo>Offer published more than</bdo>  $this->postDate day ago.</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";


    }
}
?>