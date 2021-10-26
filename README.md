# ezJSlog - Redcap External Module

## What does it do?

This very simple external module exposes two javascript functions for use in shazam or other EMs. Both functions enable easily writing information to the project-level log. An action (e.g. "Update Record" or "Add Record") along with an newline delimited list of changes can be passed to mimic the logs typical format. A record or event id differant from the current page can also be used when loging if needed.  

Easily log an action and change using the current page's record and event id.

`ez.log(action, changes)`

Log an exact record and event id using `loge`. The pid passed must match the current project (use the variable `pid` defined by redcap).

`ez.loge( action, changes, record, eventid, pid )`

## Installing

This EM isn't yet available to install via redcap's EM database so you'll need to install to your modules folder (i.e. `redcap/modules/ezJSlog_v1.0.0`) manually.

## Call outs

* There is no real need to use this module and no CTRI EM's use it anymore. Just impliment logging on a per EM or use the more robust "emLogger" by Andy Martin.

