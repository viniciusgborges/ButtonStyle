<?php

namespace Wayne\ButtonStyle\Css;

use Magento\Framework\App\State;
use Magento\Framework\Css\PreProcessor\File\Temporary;
use Magento\Framework\Phrase;
use Magento\Framework\View\Asset\ContentProcessorException;
use Magento\Framework\View\Asset\ContentProcessorInterface;
use Magento\Framework\View\Asset\File;
use Magento\Framework\View\Asset\Source;
use Wayne\ButtonStyle\Model\ResourceModel\Style\CollectionFactory as StyleFactory;

class Processor implements ContentProcessorInterface
{
    private State $appState;
    private Source $assetSource;
    private Temporary $temporaryFile;
    private StyleFactory $styleFactory;

    public function __construct(
        State           $appState,
        Source          $assetSource,
        Temporary       $temporaryFile,
        StyleFactory    $styleFactory
    )
    {
        $this->appState = $appState;
        $this->assetSource = $assetSource;
        $this->temporaryFile = $temporaryFile;
        $this->styleFactory = $styleFactory;
    }

    /**
     * @throws ContentProcessorException
     */
    public function processContent(File $asset): string
    {
        $path = $asset->getPath();
        try {
            $parser = new \Less_Parser(
                [
                    'relativeUrls' => false,
                    'compress' => $this->appState->getMode() !== State::MODE_DEVELOPER
                ]
            );

            $content = $this->assetSource->getContent($asset);

            if (trim($content) === '') {
                throw new ContentProcessorException(
                    new Phrase('Compilation from source: LESS file is empty: ' . $path)
                );
            }

            $tmpFilePath = $this->temporaryFile->createFile($path, $content);

            gc_disable();
            $parser->parseFile($tmpFilePath, '');

            $array = [];
            $styleArray = $this->styleFactory->create();
            $array['bg_color'] = '#'. $styleArray->getLastItem()->getColor();
            $parser->ModifyVars($array);

            $content = $parser->getCss();
            gc_enable();

            if (trim($content) === '') {
                throw new ContentProcessorException(
                    new Phrase('Compilation from source: LESS file is empty: ' . $path)
                );
            } else {
                return $content;
            }
        } catch (\Exception $e) {
            throw new ContentProcessorException(new Phrase($e->getMessage()));
        }
    }
}
