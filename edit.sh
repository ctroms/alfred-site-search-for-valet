#!/bin/bash

#------------------------------------------------------------------------
#
# This script determines if the editor specified in the users preferences
# is a command or a MacOS application and opens the selected site path
# in the specified editor.
#
#------------------------------------------------------------------------

sitePath=$site2

if command -v "$editor"; then

osascript <<EOS
    tell app "Terminal"
        do script "\"$editor\" \"$sitePath\""
        activate
    end tell
EOS

else
    open -a "$editor" "$sitePath";
fi
