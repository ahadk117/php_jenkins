pipeline {
    agent any
    environment {
        STAGING_SERVER = "143.110.243.191"
        SSH_PASSWORD = credentials('phpjenkinsserver')  
    }
    stages {
        stage('Deploy to Remote') {
            steps {
                script {
                    // Write password to a file to be used by sshpass
                    writeFile file: 'sshpass-password.txt', text: "${SSH_PASSWORD}"
                    
                    sh """
                    sshpass -f sshpass-password.txt scp -o StrictHostKeyChecking=no -r ${WORKSPACE}/* root@${STAGING_SERVER}:/var/www/html/phpwebapp/
                    """
                }
            }
        }
    }
    post {
        always {
            // Clean up the password file
            sh 'rm -f sshpass-password.txt'
        }
    }
}
