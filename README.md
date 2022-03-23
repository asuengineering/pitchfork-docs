# Pitchfork Docs

A plugin to which implements a documentation template and a handful of additional useful features to your WP site. 

The plugin is intended to be used within a project which loads the Bootstrap 4 assets from the [ASU Unity Project](https://github.com/asu-ke-web-services/UDS-WordPress-Theme). 

It has been tested and is compatible with the following themes:

- [UDS-WordPress](https://github.com/asu-ke-web-services/UDS-WordPress-Theme) from ASU Knowledge Enterprise . 
- [Pitchfork](https://github.com/asuengineering/pitchfork) from ASU Engineering.

## Requirements

Clone the lastest from the `main` branch or download a release from GitHub. 

Dependancies from `composer` are included in the source code for the repo. No need for a build step. 

## Includes

This plugin leverages the following JS / Composer libraries for functionality delivered to the front end.

- The [Hybrid Breadcrumbs](https://github.com/themehybrid/hybrid-breadcrumbs) composer-based assset for including breadcrumbs.
- The [TOCBot](https://github.com/tscanlin/tocbot) project is responsible for the main document sidebar which highlights the headings within a published document for easier reference. 

## Notes

**Table of Contents**
- The links within the table-of-contents sidebar are dependent on all headings within the body of a document having `id`s established.
- WordPress 5.9.1 shipped with an expirimental feature which automatically creates `id`s for any included heading block in a post/page.
- WordPress 6.0 is expected to ship with a UI in the block editor which enables this feature by default.
- But, until then, please remember to add the ID element manually to all headings. 

## Development

- Run `npm install` and `composer install` prior to local development.
- SASS and JS compile & watch tasks are triggered via WP-Gulp and `npm start` from the project root.

## Release Notes

### Version 1.0

- Initial deployment of the plugin.
