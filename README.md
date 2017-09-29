# Ox 
[![Travis Build Status](https://travis-ci.org/oxboot/ox.svg)](https://travis-ci.org/oxboot/ox) [![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2VATG7M5GNZ6Q)

**Ox currently supports:**
- Ubuntu 14.04 & 16.04
## Install
```bash
wget ox.oxboot.com/ox && sudo bash ox
```
## Commands
### Site
Create & delete websites
#### Create PHP website with default settings
```bash
ox site:create domain.dev
```
#### Create website with preconfigured packages
```bash
ox site:create domain.dev --package=default
ox site:create domain.dev --package=mysql
ox site:create domain.dev --package=wordpress
ox site:create domain.dev --package=oxboot
ox site:create domain.dev --package=bedrock
ox site:create domain.dev --package=grav
```
#### Print information about website
```bash
ox site:info domain.dev
```
#### List all available websites
```bash
ox site:list
```
#### Delete website with database & all configs
```bash
ox site:delete domain.dev
```
