pipeline {
    agent any
    stages {
        stage('Deploy to Remote') {
            steps {
                sshPublisher(publishers: [sshPublisherDesc(
                    configName: 'config',
                    transfers: [sshTransfer(
                        sourceFiles: '**/*',
                        remoteDirectory: '/var/www/html/phpwebapp/',
                        removePrefix: '${WORKSPACE}/'
                    )],
                    usePromotionTimestamp: false,
                    useWorkspaceInPromotion: false,
                    verbose: true
                )])
            }
        }
    }
}
