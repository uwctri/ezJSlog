ez.config = {};
ez.config.print = false;

// Log Explicit - Log exactly what is passed to the Project Log
// Note: SQL logs (i.e. those visible only in the DB) aren't supported
// Note: While Pid is passed it must be the current project ID
ez.loge = function( action, changes, record, eventid, pid ) {
    $.ajax({
        method: 'POST',
        url: ez.post,
        data: {
            action: action,
            changes: changes,
            record: record,
            eventid: eventid,
            pid: pid
        },
        error: (jqXHR, textStatus, errorThrown) => console.log(textStatus + " " + errorThrown),
        success: (data) => {
            if ( ez.config.print )
                console.log(data)
        }
    });
}

// Log - Post to the Project Log 
ez.log = function(action, changes) {
    action = action || "";
    changes = changes || "";
    let record = getParameterByName('id');
    let eventid = getParameterByName('event_id');
    ez.loge( action, changes, record, eventid, pid);
}