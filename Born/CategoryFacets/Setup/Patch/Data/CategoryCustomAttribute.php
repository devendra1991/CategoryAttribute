<?php
/**
 * Born_CategoryFacets
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\CategoryFacets
 * @author    Born Support <support@borngroup.com>
 * @copyright 2019 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 * @link      https://www.davidsbridal.com/
 */
namespace Born\CategoryFacets\Setup\Patch\Data;

use Magento\Catalog\Model\Category;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class CategoryCustomAttribute
 *
 * @category  PHP
 * @package   Born\CustomerAccount
 * @author    Born Support <support@borngroup.com>
 * @copyright 2019 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 * @link      https://www.davidsbridal.com/
 */
class CategoryCustomAttribute implements DataPatchInterface
{
    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * CategorySetupFactory
     *
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;


    /**
     * AddCategoryRecommended constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup      ModuleDataSetupInterface
     * @param EavSetupFactory          $eavSetupFactory      EavSetupFactory
     * @param CategorySetupFactory     $categorySetupFactory CategorySetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->categorySetupFactory = $categorySetupFactory;
    }//end __construct()


    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(Category::ENTITY, 'category_facet_index', [
            'type' => 'text',
            'label' => 'Category Facet',
            'required' => false,
            'input' => 'text',
            'sort_order' => 26,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General Information',
        ]);
    }//end apply()


    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }//end getDependencies()


    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }//end getAliases()


}//end class
