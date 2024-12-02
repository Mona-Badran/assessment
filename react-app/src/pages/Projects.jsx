import React from "react";
import Project from "../components/Project";

const Projects = () => {
  const projects = [
    {
      id: 1,
      name: "Project A",
      description: "Sample project.",
      members: [
        { id: 1, name: "Jane" },
        { id: 2, name: "Taha" },
      ],
    },
    {
      id: 2,
      name: "Project B",
      description: "Sample project.",
      members: [
        { id: 3, name: "Charbel" },
        { id: 4, name: "Nour" },
      ],
    },
  ];
  return (
    <div className="projects-container">
      {projects.map((p) => (
        <Project project={p} key={p.id} />
      ))}
    </div>
  );
};

export default Projects;
