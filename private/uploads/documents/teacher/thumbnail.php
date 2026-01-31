<?php

$newfileId=$_GET['id'];
$document=$_GET['document'];

 $documentName = pathinfo($document, PATHINFO_FILENAME);
      




           $thumbnail =$documentName.'jpeg';

                if (file_exists($filePath)) {
                  // Create a new Imagick object
                  $imagick = new Imagick();

                  // Set resolution for better quality thumbnails
                  $imagick->setResolution(150, 150); 

                  // Read a specific page of the PDF (e.g., [0] for the first page)
                  $imagick->ReadImage($document[0]);

                  // Set the output image format (e.g., JPEG)
                  $imagick->setImageFormat('jpeg');

                  // Resize the image to the desired thumbnail dimensions
                  // The 'true' parameter maintains aspect ratio
                  $imagick->thumbnailImage(250, 250, true);

                  // Save the thumbnail to the specified output path
                  $imagick->writeImage($thumbnail);

                  // Clear and destroy the Imagick object to free up resources
                  $imagick->clear();
                  $imagick->destroy();

                  return true; // Thumbnail generation successful

                }                     



header ("Location:/public/workspace/teacher.php?edit=yes&file=$newFileId");