<?php
if(isset($_GET['classid'])) $classid = $_GET['classid']; 
if(isset($_GET['studentid'])) $studentid = $_GET['studentid']; 
if(isset($_GET['classname'])) $classname = $_GET['classname'];
if(isset($_GET['section'])) $section = $_GET['section'];
if(isset($_GET['roll'])) $roll = $_GET['roll'];

// print_r($_GET);
// echo $classid;
// echo $studentid;
// echo $classname;
// echo $section;
// echo $roll;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SRMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

define('FPDF_FONTPATH','font/');
//Include fpdf file
require('fpdf.php');

//Create new object
$pdf = new FPDF();

//Add new pages. by default no pages available.
$pdf->AddPage();

//Set Font format and size
$pdf->SetFont('helvetica','',10);
// $pdf->SetFont('Courier', 'B', 25);

//Framed rectangular Heading
$pdf->Cell(0,15, 'Student Result : Resulting', 1, 1, 'C');

//Get student name from tblstudents
$get_student_name = $conn->query("SELECT StudentName FROM tblstudents WHERE StudentId = '$studentid'");
$student_name_array = mysqli_fetch_array($get_student_name);
$student_name = $student_name_array['StudentName'];

// $pdf->SetFont('Courier', 'B', 20);
//Student details 
$pdf->Cell(50,10, 'Student Name : '.$student_name, 0, 0, 'C');
$pdf->Cell(0,10, 'Class : '.$classname, 0, 1, 'C');
$pdf->Cell(50,10, 'Section : '.$section, 0, 0, 'C');
$pdf->Cell(0,10, 'Roll : '.$roll, 0, 1, 'C');

//Building the result table header
$pdf->Cell(60,10, 'Subject Name', 1, 0, 'C');
$pdf->Cell(0,10, 'Marks Obtained', 1, 1, 'C');


// $pdf->SetFont('Courier', 16);
//Inserting contents into the table
$subjectids_by_classid_studentid = $conn->query("SELECT SubjectId FROM tblresult WHERE StudentId = '$studentid' AND ClassId = '$classid'");
if(mysqli_num_rows($subjectids_by_classid_studentid))
{
    while($subjectids_by_classid_studentid_array = mysqli_fetch_array($subjectids_by_classid_studentid))
    {
        $single_subject_id = $subjectids_by_classid_studentid_array['SubjectId'];
        $subject_names = $conn->query("SELECT SubjectName FROM tblsubjects WHERE SubjectId = '$single_subject_id'");
        $subject_names_array = mysqli_fetch_array($subject_names);
        $single_subject_name = $subject_names_array['SubjectName'];
        
        $subject_mark = $conn->query("SELECT Marks FROM tblresult WHERE SubjectId = '$single_subject_id'");
        $subject_mark_array = mysqli_fetch_array($subject_mark);
        $single_subject_mark = $subject_mark_array['Marks'];

        $pdf->Cell(60, 10, $single_subject_name, 1, 0, 'C');
        $pdf->Cell(0, 10, $single_subject_mark, 1, 1, 'C');
    }
}

//Output the pdf contents
$pdf->Output();
?>