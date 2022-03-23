/**
 * JS file to initalize TOC Bot. Output visible within document.php. (single-pitchfork-doc.php)
 * 
 */

 tocbot.init({

    headingsOffset: 96,
    scrollSmoothOffset: -96,
    throttleTimeout: 10,


    // Where to render the table of contents.
    tocSelector: '.render-toc',
    // Where to grab the headings to build the table of contents.
    contentSelector: '.entry-content',
    // Which headings to grab inside of the contentSelector element.
    headingSelector: 'h1, h2, h3, h4',
    // For headings inside relative or absolute positioned containers within content.
    hasInnerContainers: true,
  });