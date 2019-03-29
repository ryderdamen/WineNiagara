.PHONY: build
build:
	docker build -t gcr.io/radical-sloth/wine-niagara .

.PHONY: run
run:
	docker run -p 80:80 gcr.io/radical-sloth/wine-niagara

.PHONY: push
push:
	docker push gcr.io/radical-sloth/wine-niagara

.PHONY: deploy
deploy:
	kubectl apply -f kubernetes/deployment.yaml -f kubernetes/service.yaml
