<?php

class VideoEditor
{
    private $videoProcessor;
    private $fileManager;

    public function __construct(VideoProcessor $videoProcessor, FileManager $fileManager)
    {
        $this->videoProcessor = $videoProcessor;
        $this->fileManager = $fileManager;
    }

    public function loadVideo(string $filePath): void
    {
        $this->videoProcessor->loadVideo($filePath);
    }

    public function saveVideo(string $outputPath): void
    {
        $this->videoProcessor->saveVideo($outputPath);
        $this->fileManager->saveMetadata($outputPath);
    }

    public function applyFilter(string $filterName)
    {
        // Simple implementation assuming basic filter application within VideoProcessor
        $this->videoProcessor->applyFilter($filterName);
    }
}

abstract class VideoProcessor
{
    public abstract function loadVideo(string $filePath): void;
    public abstract function saveVideo(string $outputPath): void;
    public abstract function applyFilter(string $filterName): void; // Optional for basic variation
}


class BasicVideoProcessor extends VideoProcessor
{
    public function loadVideo(string $filePath): void
    {
        echo "Loaded video using basic methods: $filePath" . PHP_EOL;
    }

    public function saveVideo(string $outputPath): void
    {
        echo "Saved video using basic methods: $outputPath" . PHP_EOL;
    }

    public function applyFilter(string $filterName): void
    {
        // Basic filter application logic here (could be a placeholder for future enhancement)
        echo "Applying basic filter: $filterName" . PHP_EOL;
    }
}

abstract class FileManager
{
    public abstract function saveMetadata(string $filePath): void;
}

class BasicFileManager extends FileManager
{
    public function saveMetadata(string $filePath): void
    {
        echo "Saved basic metadata for: $filePath" . PHP_EOL;
    }
}

// Create objects
$videoProcessor = new BasicVideoProcessor();
$fileManager = new BasicFileManager();

// Create a VideoEditor with the chosen processor and file manager

$videoEditor = new VideoEditor($videoProcessor, $fileManager);
// Use the VideoEditor for editing tasks
$videoEditor->loadVideo("my_video.mp4");
$videoEditor->applyFilter("grayscale");
$videoEditor->saveVideo("edited_video.mp4");


