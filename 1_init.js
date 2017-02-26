var r = require('child_process'),
    p = require('./package.json');

r.exec("git clone git@github.com:vanilla-thunder/"+p.name+".git _master --depth 1",
    function (err, stdout, stderr) {
        if(err) console.log(err);
        else if(stderr) console.log(stderr);
        else console.log("master ok");
    }
);
r.exec("git clone -b module git@github.com:vanilla-thunder/"+p.name+".git _module --depth 1",
    function (err, stdout, stderr) {
        if(err) console.log(err);
        else if(stderr) console.log(stderr);
        else console.log("module ok");
    }
);
r.exec("npm install",
    function (err, stdout, stderr) {
        if(err) console.log('err: '+err);
        else if(stderr) console.log('stderr: '+stderr);
        else console.log("npm packages installed");
    }
);

process.on('exit', function (code) {
    console.log('initializing finished');
});