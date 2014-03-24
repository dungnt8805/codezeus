from fabric.api import *

def rmcache():
    local("find {0} {1} -type f -name '*%%.php' -exec rm -rf {{}} \;".format('app/views/', 'cache/'))
    local("find {0} {1} -type f -name '*volt.php' -exec rm -rf {{}} \;".format('app/views/', 'cache/'))

"""
Does a git pull
It's the lazy mans way of saving on keystrokes

$ fab pull
$ fab pull:branch
"""
def pull(branch = 'master'):
    local('git pull origin {0}'.format(branch))

"""
Updates the permissions in Linux

$ fab   permissions
"""
def permissions():
    local("sudo chown -R www-data:www-data *")