pipeline {
    agent any
    environment {
        staging_server="143.110.243.191"
       
    }

    stages {
        stage('Deploy  to Remote') {
            steps {
                sh "scp -r ${WORKSPACE}/* root@${staging_server}:/var/www/html/phpwebapp/"
            }
        }
    }
}
