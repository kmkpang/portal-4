let packageJson = require('../package.json');
let exec = require('child_process').exec;
const fs = require('fs');
const path = require('path');

let currentPath = __dirname;
console.log('Running from directory ', currentPath);
let projectRoot = path.resolve(currentPath + '/../');
console.log('Project root is : ', projectRoot);

executeShellCommand('git log --pretty=oneline --abbrev-commit | head -1', function (output) {
    console.log('Current git hash is : ', output);
    packageJson.gitHash = output;
    const filePath = projectRoot + '/package.json';
    console.log('Writing to file at : ' + filePath);
    fs.writeFileSync(filePath, JSON.stringify(packageJson, null, 4));
});

function executeShellCommand(command, callback) {
    exec(command, function (error, stdout, stderr) {
        callback(stdout);
    });
}
