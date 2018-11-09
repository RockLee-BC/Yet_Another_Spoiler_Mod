[hr]
[center][color=red][size=16pt][b]YET ANOTHER SPOILER MOD v1.2[/b][/size][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=253913][b]By Dougiefresh[/b][/url] -> [url=http://custom.simplemachines.org/mods/index.php?mod=4166]Link to Mod[/url]
[/center]
[hr]

[color=blue][b][size=12pt][u]Introduction[/u][/size][/b][/color]
This modification adds 3 BBCodes to the forum: [b]spoiler[/b], [b]changelog[/b] and [b]offtopic[/b].  These bbcodes allows the post author to hide content in the post, which is clickable to display it to the user.

These BBCode takes the forms:
[code][nobbc]
[nobbc][spoiler]{content}[/spoiler][/nobbc]
[nobbc][spoiler {params}]{content}[/spoiler][/nobbc]
[nobbc][spoiler=Some Text]{content goes here}[/spoiler][/nobbc]
[/nobbc][/code]

The [b]{params}[/b] section may be any of the following parameters:
o [b]text[/b] - Replaces default "Spoiler" text in the header.
o [b]quote[/b] - Text that follows the "Spoiler" text in the header.  Must be in quotes.
o [b]show[/b] - Replaces default "Show" text in the header.
o [b]hide[/b] - Replaces default "Hide" text in the header.
o [b]guests[/b] - Flag to show spoiler to guests or not.  May be [b]n[/b], [b]no[/b], [b]false[/b], [b]y[/b], [b]yes[/b], or [b]true[/b].
o [b]log[/b] - Flag to enable/disable logging of who viewed the spoiler.
o [b]log_id[/b] - [b]DO NOT EDIT![/b]  Automatically replaces [b]log[/b] parameter with number of spoiler we are tracking.

[color=blue][b][size=12pt][u]Admin Settings[/u][/size][/b][/color]
Each bbcode has settings in [b]Admin[/b] => [b]Configuration[/b] => [b]Modification Settings[/b] => [b]YASM[/b]:
o [b][i]{tag_name}[/i] style to use:[/b]
o [b]Replace button text "[i]{tag_name}[/i]" with:[/b]
o [b]Replace button text "Show" with:[/b]
o [b]Replace button text "Hide" with:[/b]
o [b]Default to expanded status?[/b]
o [b]Disable [i]{tag_name}[/i] for guests globally?[/b]
o [b]Disable line beneath [i]{tag_name}[/i] text?[/b]
o [b]Show which members viewed the [i]{tag_name}[/i]?[/b]
o [b]Number of members to show that viewed the {tag_name}[/b]

These BBCodes may be disabled by going into the [b]Admin[/b] => [b]Forum[/b] => [b]Posts and Topics[/b] => [b]Bulletin Board Code[/b] and unchecking the bbcodes you don't want to use.  You may also be uninstall this mod in order to disable them.

[color=blue][b][size=12pt][u]Mod Install Notes[/u][/size][/b][/color]
This mod [b]REPLACES[/b] and expands upon the functionality in the following mods:
o [url=http://custom.simplemachines.org/mods/index.php?mod=3980]Expanding & Collapsing Spoiler Tag[/url]
o [url=http://custom.simplemachines.org/mods/index.php?mod=3990]Expanding & Collapsing Off-Topic Tag[/url]
o [url=http://custom.simplemachines.org/mods/index.php?mod=3981]Expanding & Collapsing Spoiler Tag[/url]

These mods [b]NEED TO BE[/b] removed prior to installation of this mod, as the installer will not permit this mod to be installed alongside those mods!  I will not be supporting those mods once this mod is approved!

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.15, but should work on SMF 2.1 Beta 3, as well as SMF 2.0 and up.  SMF 1.x is not and will not be supported.

[color=blue][b][size=12pt][u]Related Discussions[/u][/size][/b][/color]
o [url=https://www.simplemachines.org/community/index.php?topic=530701.msg3909493#msg3909493]Kortal's request for spoiler redesign[/url]
o [url=https://www.simplemachines.org/community/index.php?topic=530701.msg3941997#msg3941997]WellWisher's changes to the design[/url]
o [url=https://www.simplemachines.org/community/index.php?topic=541143.0]Spoilers[/url]
o [url=https://www.simplemachines.org/community/index.php?topic=541750.0][FREE/PAID] - Spoiler tag with user record[/url]
o [url=https://www.simplemachines.org/community/index.php?topic=487552.0][FREE] Spoiler Mod Tweaks[/url]

[color=blue][b][size=12pt][u]Changelog[/u][/size][/b][/color]
The changelog can be viewed at [url=http://www.xptsp.com/board/free-modifications/yet-another-spoiler-mod/?tab=1]XPtsp.com[/url].

[color=blue][b][size=12pt][u]License[/u][/size][/b][/color]
Copyright (c) 2017 - 2018, Douglas Orend
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
