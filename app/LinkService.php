<?php

namespace App;

class LinkService
{
    /**
     * Funkcja tworząca linki - używana w kontrolerach
     */
    public function getLinks($activePage)
    {
        $pages = [
            'home' => 'Home',
            'tutorials.index' => 'Tutorials',
            'coord-changer' => 'Coord Changer',
            // 'about' => 'About',
            'contact' => 'Contact',
        ];

        $links = [];

        foreach ($pages as $slug => $name) {
            $links[] = [
                'name' => $name,
                'url' => route($slug),
                'active' => $slug === $activePage,
            ];
        }

        return $links;
    }
}
