<?php

declare(strict_types=1);

require_once('../autoload.php');

class Webpage
{
  private string $head= "";
  private string $title= "";
  private string $body= "";

  /**
   * Constructeur de la classe WebPage.
   * Ce constructeur permet d'initialiser un titre d'une page Web sous la forme
   * d'une chaîne de caractères.
   *
   * @param string $title Titre d'une page web.
   */
  public function __construct(string $title = '')
  {
    $this->title = $title;
  }

  /**
   * Accesseur de la classe WebPage.
   * Cet accesseur permet de retourner le head d'une page Web sous la forme d'une
   * chaîne de caractères.
   *
   * @return string HEAD d'une page Web.
   */
  public function getHead()
  {
    return $this->head;
  }

  /**
   * Accesseur de la classe WebPage.
   * Cet accesseur permet de retourner le titre d'une page Web sous la forme d'une
   * chaîne de caractères.
   *
   * @return string Titre d'une page Web.
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Modificateur de la classe WebPage.
   * Ce modificateur permet de changer la valeur du titre d'une page web
   * sous la forme d'une chaîne de caractères.
   *
   * @param string $title Titre d'une page web
   */
  public function setTitle(string $title)
  {
    $this->title = $title;
  }

  /**
   * Accesseur de la classe WebPage.
   * Cet accesseur permet de retourner le Body d'une page Web sous la forme d'une
   * chaîne de caractères.
   *
   * @return string Body d'une page Web.
   */
  public function getBody()
  {
    return $this->body;
  }

  /**
   * Ajouter un contenu dans $this->head.
   *
   * @param string $content Le contenu à ajouter
   * @return void
   */
  public function appendToHead(string $content)
  {
    $this->head .= $content;
  }

  /**
   * Ajouter un contenu CSS dans $this->head.
   *
   * @param string $css Le contenu CSS à ajouter
   * @return void
   */
  public function appendCss(string $css)
  {
    $this->appendToHead(<<<HTML
      <style>
        {$css}
      </style>
    HTML
    );
  }

  /**
    * Ajouter l'URL d'un script CSS dans $this->head.
    *
    * @param url L'URL du script CSS
    * @return string
    */
  public function appendCssUrl(string $url)
  {
    $this->appendToHead(<<<HTML
      <link href="$url" rel="stylesheet">
    HTML
    );
  }

  /**
    * Ajouter un contenu JavaScript dans $this->head.
    *
    * @param string $js Le contenu JavaScript à ajouter
    * @return void
    */
  public function appendJs(string $js)
  {
    $this->appendToHead(<<<HTML
      <script>
        {$js}
      </script>
    HTML
    );
  }

  /**
    * Ajouter l'URL d'un script JavaScript dans $this->head.
    *
    * @param string $url L'URL du script JavaScript
    * @return void
    */
  public function appendJsUrl(string $url)
  {
    $this->appendToHead(<<<HTML
        <script src="$url"></script>
    HTML
    );
  }

  /**
    * Ajouter un contenu dans $this->body.
    *
    * @param string $content Le contenu à ajouter
    * @return void
    */
  public function appendContent(string $content)
  {
    $this->body .= $content;
  }

  /**
    * Produire la page Web complète.
    *
    * @return string
    */
  public function toHTML(): string
  {
    return <<<HTML
    <!doctype html>
    <html lang="fr">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>{$this->getTitle()}</title>
        {$this->getHead()}
      </head>
      <body>
        {$this->getBody()}
      </body>
    </html>
    HTML;
  }

  /**
    * Protéger les caractères spéciaux pouvant dégrader la page Web.
    *
    * @param string $string La chaîne à protéger
    * @return string La chaîne protégée
    */
  public function escapeString(string $string): string
  {
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5,'UTF-8', true);
  }
}
