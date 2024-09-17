export interface Task {
  id: number
  title: string
  description?: string
  dateCreated: Date
  dateToBeCompleted?: Date
  dateCompleted?: Date
}

export interface Project {
  id: number
  title: string
  tasks?: Task[]
}
