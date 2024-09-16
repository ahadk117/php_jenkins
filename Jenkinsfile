pipeline {
    agent any
    environment {
        STAGING_SERVER = "143.110.243.191"
        SSH_PASSWORD = credentials('Ahad@0786')  
    }
    stages {
        stage('Deploy to Remote') {
            steps {
                sh """
                sshpass -p \$SSH_PASSWORD scp -o StrictHostKeyChecking=no -r ${WORKSPACE}/* root@${STAGING_SERVER}:/var/www/html/phpwebapp/
                """
            }
        }
    }
}
