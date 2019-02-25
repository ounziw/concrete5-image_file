<?php

namespace Application\Attribute\ImageFile;

use File;
use Concrete\Core\File\Importer;

class Controller extends \Concrete\Attribute\ImageFile\Controller
{

    public function createAttributeValueFromRequest()
    {
        $data = $this->post();
        if ($this->getAttributeKeySettings()->isModeFileManager()) {
            if ($data['value'] > 0) {
                $f = File::getByID($data['value']);

                return $this->createAttributeValue($f);
            }
        }
        if ($this->getAttributeKeySettings()->isModeHtmlInput()) {
            if ($data['value']['clear'] == 'on') {
                return $this->createAttributeValue(null);
            } else {
                // import the file.
                $tmp_name = $_FILES['akID']['tmp_name'][$this->attributeKey->getAttributeKeyID()]['value'];
                $name = $_FILES['akID']['name'][$this->attributeKey->getAttributeKeyID()]['value'];
                if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
                    $importer = new Importer();
                    $f = $importer->import($tmp_name, $name);
                    if (is_object($f)) {
                        return $this->createAttributeValue($f->getFile());
                    }
                } elseif ($data['value']['id']) {
                    $f = File::getByID($data['value']['id']);
                    return $this->createAttributeValue($f);
                }
            }
            return $this->createAttributeValue(null);
        }

    }
}
