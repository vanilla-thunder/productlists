var runner = require('child_process'),
	shell = function (command) {
    runner.exec(command,
        function (err, stdout, stderr) {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

shell("npm install --production");
shell("git clone --depth 1 git@github.com:vanilla-thunder/vt-nca.git _master");
shell("git clone -b module git@github.com:vanilla-thunder/vt-nca.git _module --depth 1");

process.on('exit', function (code) {
    console.log('initializing finished');
});