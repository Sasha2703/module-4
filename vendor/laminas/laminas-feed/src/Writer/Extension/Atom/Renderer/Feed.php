<?php

namespace Laminas\Feed\Writer\Extension\Atom\Renderer;

use DOMDocument;
use DOMElement;
use Laminas\Feed\Writer\Extension;

use function strtolower;

class Feed extends Extension\AbstractRenderer
{
    /**
     * Set to TRUE if a rendering method actually renders something. This
     * is used to prevent premature appending of a XML namespace declaration
     * until an element which requires it is actually appended.
     *
     * @var bool
     */
    protected $called = false;

    /**
     * Render feed
     *
     * @return void
     */
    public function render()
    {
        /**
         * RSS 2.0 only. Used mainly to include Atom links and
         * Pubsubhubbub Hub endpoint URIs under the Atom namespace
         */
        if (strtolower($this->getType()) === 'atom') {
            return;
        }
        $this->_setFeedLinks($this->dom, $this->base);
        $this->_setHubs($this->dom, $this->base);
        if ($this->called) {
            $this->_appendNamespaces();
        }
    }

    // phpcs:disable PSR2.Methods.MethodDeclaration.Underscore

    /**
     * Append namespaces to root element of feed
     *
     * @return void
     */
    protected function _appendNamespaces()
    {
        $this->getRootElement()->setAttribute(
            'xmlns:atom',
            'http://www.w3.org/2005/Atom'
        );
    }

    /**
     * Set feed link elements
     *
     * @return void
     */
    protected function _setFeedLinks(DOMDocument $dom, DOMElement $root)
    {
        $flinks = $this->getDataContainer()->getFeedLinks();
        if (! $flinks || empty($flinks)) {
            return;
        }
        foreach ($flinks as $type => $href) {
            if (strtolower($type) === $this->getType()) { // issue 2605
                $mime  = 'application/' . strtolower($type) . '+xml';
                $flink = $dom->createElement('atom:link');
                $root->appendChild($flink);
                $flink->setAttribute('rel', 'self');
                $flink->setAttribute('type', $mime);
                $flink->setAttribute('href', $href);
            }
        }
        $this->called = true;
    }

    /**
     * Set PuSH hubs
     *
     * @return void
     */
    protected function _setHubs(DOMDocument $dom, DOMElement $root)
    {
        $hubs = $this->getDataContainer()->getHubs();
        if (! $hubs || empty($hubs)) {
            return;
        }
        foreach ($hubs as $hubUrl) {
            $hub = $dom->createElement('atom:link');
            $hub->setAttribute('rel', 'hub');
            $hub->setAttribute('href', $hubUrl);
            $root->appendChild($hub);
        }
        $this->called = true;
    }

    // phpcs:enable PSR2.Methods.MethodDeclaration.Underscore
}
