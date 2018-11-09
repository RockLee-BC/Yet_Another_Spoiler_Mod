------

# YET ANOTHER SPOILER MOD v1.2

[**By Dougiefresh**](http://www.simplemachines.org/community/index.php?action=profile;u=253913) -> [Link to Mod](http://custom.simplemachines.org/mods/index.php?mod=4166)

------

## Introduction
This modification adds 3 BBCodes to the forum: **spoiler**, **changelog** and **offtopic**.  These bbcodes allows the post author to hide content in the post, which is clickable to display it to the user.

These BBCode takes the forms:
    [nobbc]
    [nobbc][spoiler]{content}[/spoiler][/nobbc]
    [nobbc][spoiler {params}]{content}[/spoiler][/nobbc]
    [nobbc][spoiler=Some Text]{content goes here}[/spoiler][/nobbc]
    [/nobbc]

The **{params}** section may be any of the following parameters:

- **text** - Replaces default "Spoiler" text in the header.
- **quote** - Text that follows the "Spoiler" text in the header.  Must be in quotes.
- **show** - Replaces default "Show" text in the header.
- **hide** - Replaces default "Hide" text in the header.
- **guests** - Flag to show spoiler to guests or not.  May be **n**, **no**, **false**, **y**, **yes**, or **true**.
- **log** - Flag to enable/disable logging of who viewed the spoiler.
- **log_id** - **DO NOT EDIT!**  Automatically replaces **log** parameter with number of spoiler we are tracking.

## Admin Settings
Each bbcode has settings in **Admin** => **Configuration** => **Modification Settings** => **YASM**:

- ***{tag_name}* style to use:**
- **Replace button text "*{tag_name}*" with:**
- **Replace button text "Show" with:**
- **Replace button text "Hide" with:**
- **Default to expanded status?**
- **Disable *{tag_name}* for guests globally?**
- **Disable line beneath *{tag_name}* text?**
- **Show which members viewed the *{tag_name}*?**
- **Number of members to show that viewed the {tag_name}**

These BBCodes may be disabled by going into the **Admin** => **Forum** => **Posts and Topics** => **Bulletin Board Code** and unchecking the bbcodes you don't want to use.  You may also be uninstall this mod in order to disable them.

## Mod Install Notes
This mod **REPLACES** and expands upon the functionality in the following mods:

- [Expanding & Collapsing Spoiler Tag](http://custom.simplemachines.org/mods/index.php?mod=3980)
- [Expanding & Collapsing Off-Topic Tag](http://custom.simplemachines.org/mods/index.php?mod=3990)
- [Expanding & Collapsing Spoiler Tag](http://custom.simplemachines.org/mods/index.php?mod=3981)

These mods **NEED TO BE** removed prior to installation of this mod, as the installer will not permit this mod to be installed alongside those mods!  I will not be supporting those mods once this mod is approved!

## Compatibility Notes
This mod was tested on SMF 2.0.15, but should work on SMF 2.1 Beta 3, as well as SMF 2.0 and up.  SMF 1.x is not and will not be supported.

## Related Discussions

- [Kortal's request for spoiler redesign](https://www.simplemachines.org/community/index.php?topic=530701.msg3909493#msg3909493)
- [WellWisher's changes to the design](https://www.simplemachines.org/community/index.php?topic=530701.msg3941997#msg3941997)
- [Spoilers](https://www.simplemachines.org/community/index.php?topic=541143.0)
- [[FREE/PAID] - Spoiler tag with user record](https://www.simplemachines.org/community/index.php?topic=541750.0)
- [[FREE] Spoiler Mod Tweaks](https://www.simplemachines.org/community/index.php?topic=487552.0)

## Changelog
The changelog can be viewed at [XPtsp.com](http://www.xptsp.com/board/free-modifications/yet-another-spoiler-mod/?tab=1).

## License
Copyright (c) 2017 - 2018, Douglas Orend

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
