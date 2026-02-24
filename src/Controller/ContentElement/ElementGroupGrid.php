<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupGrid\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'miscellaneous', nestedFragments: ['allowedTypes' => ['image', 'text', 'player', 'table', 'headline', 'download', 'element_group', 'accordion', 'rsce_icon_text', 'rsce_page_teaser_standard', 'rsce_team', 'rsce_block_icon_text', 'rsce_link_list', 'rsce_link_list', 'rsce_button', 'rsce_block_image_slider_text', 'rsce_block_table_link', 'rsce_block_icon_text_link']], template: 'content_element/element_group_grid')]
class ElementGroupGrid extends AbstractContentElementController
{
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        return $template->getResponse();
    }
}
