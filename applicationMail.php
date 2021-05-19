<?php

$orgName = $_POST['Organization_Name'];
$streetAddress = $_POST['Street_Address'];
$phone = $_POST['Phone'];
$from = $_POST['Email'];
$name = $_POST['Name'];
$cityTown = $_POST['City/Town'];
$postal = $_POST['Postal_Code'];
$website = $_POST['Website'];
$desktopNoOs = $_POST['Desktop_with_No_OS'];
$desktopLinux = $_POST['Desktop_with_Linux'];
$desktopWindows = $_POST['Desktop_with_Windows'];
$laptopNoOs = $_POST['Laptop_with_No_Os'];
$laptopLinux = $_POST['Laptop_with_Linux'];
$laptopWindows = $_POST['Laptop_with_Windows'];
$laptopBag = $_POST['Laptop_Bag'];
$libreOffice = $_POST['Libre_Office'];
$msOffice = $_POST['MS_Office'];
$monitors = $_POST['Monitors'];
$keyboards = $_POST['Keyboards'];
$mouses = $_POST['Mouses'];
$speakers = $_POST['Speakers'];
$printers = $_POST['Printers'];
$otherHardware = $_POST['Other_Hardware'];
$notes = $_POST['Notes'];
$to = "anonamoosekfd@gmail.com";

$subject = "Form submission";
$subject2 = "Copy of your form submission";
$message = "New submission from " . $name . "at " . $orgName . "." . "\n\n" .
    "The details are:" . "\n\n" .
    "Organization Name " . $_POST['Organization_Name'] . "\n\n" .
    "Street Address " . $_POST['Street_Address'] . "\n\n" .
    "Phone " . $$_POST['Phone'] . "\n\n" .
    "Email " . $$_POST['Email'] . "\n\n" .
    "Name " . $$_POST['Name'] . "\n\n" .
    "City/Town " . $_POST['City/Town'] . "\n\n" .
    "Postal Code " . $_POST['Postal_Code'] . "\n\n" .
    "Website " . $_POST['Website'] . "\n\n" .

    "The equipment is:" . "\n\n" .
    "Desktop with No OS " . $_POST['Desktop_with_No_OS'] . "\n\n" .
    "Desktopwith Linux " . $_POST['Desktop_with_Linux'] . "\n\n" .
    "Desktop with Windows " . $_POST['Desktop_with_Windows'] . "\n\n" .
    "Laptop with No Os " . $_POST['Laptop_with_No_Os'] . "\n\n" .
    "Laptop with Linux " . $_POST['Laptop_with_Linux'] . "\n\n" .
    "Laptop with Windows " . $_POST['Laptop_with_Windows'] . "\n\n" .
    "Laptop Bag " . $_POST['Laptop_Bag'] . "\n\n" .
    "Libre Office " . $_POST['Libre_Office'] . "\n\n" .
    "MS Office " . $_POST['MS_Office'] . "\n\n" .
    "Monitors " . $_POST['Monitors'] . "\n\n" .
    "Keyboards " . $_POST['Keyboards'] . "\n\n" .
    "Mouses " . $_POST['Mouses'] . "\n\n" .
    "Speakers " . $_POST['Speakers'] . "\n\n" .
    "Printers " . $_POST['Printers'] . "\n\n" .
    "Other Hardware " . $_POST['Other_Hardware'] . "\n\n" .
    "Notes " . $_POST['Notes'];

$message2 = "Here is a copy of your order " . $name . "\n\n" .
    "The details are:" . "\n\n" .
    "Organization Name " . $_POST['Organization_Name'] . "\n\n" .
    "Street Address " . $_POST['Street_Address'] . "\n\n" .
    "Phone " . $$_POST['Phone'] . "\n\n" .
    "Email " . $$_POST['Email'] . "\n\n" .
    "Name " . $$_POST['Name'] . "\n\n" .
    "City/Town " . $_POST['City/Town'] . "\n\n" .
    "Postal Code " . $_POST['Postal_Code'] . "\n\n" .
    "Website " . $_POST['Website'] . "\n\n" .

    "The equipment is:" . "\n\n" .
    "Desktop with No OS " . $_POST['Desktop_with_No_OS'] . "\n\n" .
    "Desktopwith Linux " . $_POST['Desktop_with_Linux'] . "\n\n" .
    "Desktop with Windows " . $_POST['Desktop_with_Windows'] . "\n\n" .
    "Laptop with No Os " . $_POST['Laptop_with_No_Os'] . "\n\n" .
    "Laptop with Linux " . $_POST['Laptop_with_Linux'] . "\n\n" .
    "Laptop with Windows " . $_POST['Laptop_with_Windows'] . "\n\n" .
    "Laptop Bag " . $_POST['Laptop_Bag'] . "\n\n" .
    "Libre Office " . $_POST['Libre_Office'] . "\n\n" .
    "MS Office " . $_POST['MS_Office'] . "\n\n" .
    "Monitors " . $_POST['Monitors'] . "\n\n" .
    "Keyboards " . $_POST['Keyboards'] . "\n\n" .
    "Mouses " . $_POST['Mouses'] . "\n\n" .
    "Speakers " . $_POST['Speakers'] . "\n\n" .
    "Printers " . $_POST['Printers'] . "\n\n" .
    "Other Hardware " . $_POST['Other_Hardware'] . "\n\n" .
    "Notes " . $_POST['Notes'];

$headers = "From:" . $from;
$headers2 = "From:" . $to;
mail($to, $subject, $message, $headers);
mail($from, $subject2, $message2, $headers2);
echo "Form Submitted. Thank you " . $name . ", we will contact you shortly.";
