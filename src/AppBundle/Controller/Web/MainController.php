<?php

/**
 * (c) Evis Bregu <evis.bregu@gmail.com>.
 */

namespace AppBundle\Controller\Web;

use Highlight\Highlighter;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction(LoggerInterface $logger)
    {
        $logger->info("TEST DEPRECATIONS");

        $hl = new Highlighter();
        $highlighted = $hl->highlight('markdown', file_get_contents('../README.md'));

        $content = $this->stripFirstLine($this->stripFirstLine($highlighted->value));

        return $this->render('main/homepage.html.twig', ['content' => $content, 'language' => $highlighted->language]);
    }

    private function stripFirstLine($text)
    {
        return mb_substr($text, mb_strpos($text, "\n") + 1);
    }
}
