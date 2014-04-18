<?php

namespace Cmf\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoMetadata;
use Symfony\Cmf\Bundle\SeoBundle\SeoMetadataInterface;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;

/**
 * @PHPCR\Document()
 *
 * @author Maximilian Berghoff <Maximilian.Berghoff@gmx.de>
 */
class SeoPage extends Page implements SeoAwareInterface
{
    /**
     * @var SeoMetadata
     *
     * @PHPCR\String(assoc="")
     */
    protected $seoMetadata;

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->seoMetadata = new SeoMetadata();
    }

    /**
     * Gets the SEO metadata for this content.
     *
     * @return SeoMetadataInterface
     */
    public function getSeoMetadata()
    {
        return $this->seoMetadata;
    }

    /**
     * Sets the SEO metadata for this content.
     *
     * This method is used by a listener, which converts the metadata to a
     * plain array in order to persist it and converts it back when the content
     * is fetched.
     *
     * @param array|SeoMetadataInterface $metadata
     */
    public function setSeoMetadata($metadata)
    {
        $this->seoMetadata = $metadata;
    }
}
 