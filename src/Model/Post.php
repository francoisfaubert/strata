<?php
namespace Strata\Model;

use Strata\Model\CustomPostType\LabelParser;
use Strata\Model\CustomPostType\CustomPostType;
use Exception;

/**
 * Wraps Post default objects.
 */
class Post extends CustomPostType
{

    public $wpPrefix = "";

    public $belongs_to = array("Strata\Model\Taxonomy\Category");

    /**
     * The permission level required for editing by the model
     * @var string
     */
    public $permissionLevel = 'edit_posts';

    public function __construct()
    {
    }

    /**
     * Returns a label object that exposes singular and plural labels
     * @return LabelParser
     */
    public function getLabel()
    {
        $labelParser = new LabelParser($this);
        $labelParser->parse();
        return $labelParser;
    }

    public function register()
    {
        throw new Exception("Posts cannot be registered.");
    }
}
