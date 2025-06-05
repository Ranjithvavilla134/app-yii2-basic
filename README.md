# Yii2 DevOps Deployment with Docker Swarm, NGINX, GitHub Actions, and Ansible

## 🚀 Features

- Dockerized Yii2 PHP application
- Docker Swarm for container orchestration
- NGINX host-based reverse proxy
- GitHub Actions CI/CD on push to main
- Infrastructure provisioning via Ansible

## 🔧 Setup Instructions

1. Clone repo to EC2
2. Run Ansible playbook: `ansible-playbook -i inventory ansible/install.yml`
3. Push code to `main` to trigger deployment
4. Access app at `http://<your-ec2-ip>/`

## 🔐 Secrets Required

| Name               | Description               |
|--------------------|---------------------------|
| DOCKER_USERNAME    | Docker Hub username       |
| DOCKER_PASSWORD    | Docker Hub password/token |
| EC2_HOST           | Public IP of EC2          |
| EC2_USER           | Usually `ubuntu`          |
| EC2_SSH_KEY        | EC2 private key content   |

## 📄 Assumptions

- EC2 uses Ubuntu and has security group with port 22, 80, 9000 open
- Docker and NGINX run on host machine
